<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Sheets;
use App\Models\User;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export($status_id, $skema_id, $angkatan_id, $fakultas_id)
    {
        // Konfigurasi Google Client
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/credentials.json'));
        $client->setScopes([Sheets::SPREADSHEETS]);

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithAssertion();
        }

        $service = new Sheets($client);

        // Data yang ingin ditulis ke spreadsheet
        $users = User::where('status_id', $status_id)
            ->where('skema_id', $skema_id)
            ->where('angkatan_id', $angkatan_id)
            ->where('fakultas_id', $fakultas_id)
            ->get();

        $spreadsheet = new \Google_Service_Sheets_Spreadsheet([
            'properties' => [
                'title' => 'Data Mahasiswa'
            ]
        ]);

        $spreadsheet = $service->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId'
        ]);

        $spreadsheetId = $spreadsheet->spreadsheetId;

        $data = [
            ['NIM', 'Nama', 'Skema', 'Fakultas', 'Program Studi', 'Email', 'Nomor Mahasiswa', 'Nomor Orang Tua', 'Jenis Kelamin', 'Alamat']
        ];

        foreach ($users as $user) {
            $data[] = [
                $user->nim,
                $user->nama,
                $user->skema->nama,
                $user->fakultas->nama,
                $user->prodi->nama,
                $user->email,
                $user->no_mhs,
                $user->no_ortu,
                $user->jenis_kelamin,
                $user->alamat
            ];
        }

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $service->spreadsheets_values->update($spreadsheetId, 'A1', $body, $params);

        // Mengembalikan URL spreadsheet
        $spreadsheetUrl = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}";

        return response()->json(['url' => $spreadsheetUrl]);
    }
}

<?php
require 'google_sheets_config.php';

use Google\Service\Sheets;

// Inisialisasi Google Client menggunakan fungsi dari file konfigurasi
$client = getGoogleClient();

// Inisialisasi Google Sheets Service
$service = new Sheets($client);

// Contoh untuk membuat spreadsheet baru
$spreadsheet = new Sheets\Spreadsheet([
    'properties' => [
        'title' => 'My Spreadsheet'
    ]
]);

try {
    $spreadsheet = $service->spreadsheets->create($spreadsheet, [
        'fields' => 'spreadsheetId'
    ]);
    printf("Spreadsheet ID: %s\n", $spreadsheet->spreadsheetId);
    // Redirect ke spreadsheet yang baru dibuat
    header('Location: https://docs.google.com/spreadsheets/d/' . $spreadsheet->spreadsheetId);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function downloadFile($filename)
    {
        // Path to the file in the storage
        $path = storage_path('app/uploads/' . $filename);

        // Check if file exists
        if (!file_exists($path)) {
            abort(404);
        }

        // Return the file for download
        return response()->download($path);
    }

    public function previewFile($filename)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();

        // Mendapatkan jalur file yang benar menggunakan Storage facade
        $filePath = storage_path('app/public/uploads/' . $filename);

        // Pastikan file ada
        if (!file_exists($filePath)) {
            abort(404);
        }

        $fileMimeType = mime_content_type($filePath);
        $fileUrl = asset('storage/uploads/' . $filename);

        $viewableMimeTypes = [
            'application/pdf',
            'image/jpeg',
            'image/png',
            'image/gif',
            'text/plain',
        ];

        if (in_array($fileMimeType, $viewableMimeTypes)) {
            // Tampilkan view untuk preview file
            return view('admin.preview', compact('fileMimeType', 'fileUrl', 'filename', 'total_users_konfirmasi'));
        } else {
            // Jika file tidak bisa dipreview, tampilkan opsi untuk mendownloadnya
            return response()->download($filePath);
        }
    }
}

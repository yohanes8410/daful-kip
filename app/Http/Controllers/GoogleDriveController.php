<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;

class GoogleDriveController extends Controller
{
    protected $googleDriveService;

    public function __construct(GoogleDriveService $googleDriveService)
    {
        $this->googleDriveService = $googleDriveService;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $filePath = $file->getPathName();
        $fileName = $file->getClientOriginalName();

        $fileId = $this->googleDriveService->uploadFile($filePath, $fileName);
        $fileUrl = $this->googleDriveService->getFileUrl($fileId);

        // Simpan URL file ke database atau lakukan operasi lain sesuai kebutuhan

        return redirect()->back()->with('success', 'File uploaded successfully! File URL: ' . $fileUrl);
    }

    public function preview($fileId)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $fileUrl = $this->googleDriveService->getFileUrl($fileId);

        return view('admin.preview', compact('fileUrl', 'total_users_konfirmasi'));
    }
}

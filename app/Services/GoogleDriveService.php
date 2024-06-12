<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class GoogleDriveService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId(config('services.google.client_id'));
        $this->client->setClientSecret(config('services.google.client_secret'));
        $this->client->refreshToken(config('services.google.refresh_token'));
    }

    public function uploadFile($filePath, $fileName)
    {
        $service = new Google_Service_Drive($this->client);

        $file = new Google_Service_Drive_DriveFile();
        $file->setName($fileName);

        $result = $service->files->create($file, [
            'data' => file_get_contents($filePath),
            'mimeType' => mime_content_type($filePath),
            'uploadType' => 'multipart'
        ]);

        return $result->id;
    }

    public function getFileUrl($fileId)
    {
        return "https://drive.google.com/file/d/$fileId/view";
    }
}

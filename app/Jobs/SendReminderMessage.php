<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Models\Reminder;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendReminderMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reminder;

    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
    }

    public function handle()
    {
        Log::info('SendReminderMessage job started for reminder ID: ' . $this->reminder->id);

        $client = new Client();
        $apiKey = env('FONNTE_API_KEY');

        $users = User::all();
        foreach ($users as $user) {
            $targetNumber = $this->reminder->send_to == 'mahasiswa' ? $user->no_mhs : $user->no_ortu;

            $response = $client->post('https://api.fonnte.com/send', [
                'headers' => [
                    'Authorization' => $apiKey,
                ],
                'form_params' => [
                    'target' => $targetNumber,
                    'message' => $this->reminder->message,
                ]
            ]);

            Log::info('Sent reminder to: ' . $targetNumber . ', Response: ' . $response->getBody());
        }


        $this->reminder->next_send_time = now()->addDay();
        $this->reminder->save();

        Log::info('Next send time updated for reminder ID: ' . $this->reminder->id . ' to ' . $this->reminder->next_send_time);
    }
}
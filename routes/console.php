<?php

use App\Models\Reminder;
use App\Jobs\SendReminderMessage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('send:reminders', function () {
    Log::info('Running send:reminders command');

    $now = now();
    $reminders = Reminder::where('start_date', '<=', $now->toDateString())
        ->where('end_date', '>=', $now->toDateString())
        ->whereTime('send_time', '=', $now->format('H:i'))
        ->get();

    foreach ($reminders as $reminder) {
        Log::info('Dispatching SendReminderMessage job for reminder ID: ' . $reminder->id);
        SendReminderMessage::dispatch($reminder);
    }
})->everyMinute();

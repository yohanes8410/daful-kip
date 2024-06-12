<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderMessage;
use App\Models\Reminder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class ReminderController extends Controller
{


    public function create()
    {
        $reminders = Reminder::all();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('reminders.create', compact('total_users_konfirmasi', 'reminders'));
    }

    public function store(Request $request)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();

        $request->validate([
            'send_to' => 'required|in:mahasiswa,ortu',
            'message' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'send_time' => 'required|date_format:H:i',
        ]);

        $reminder = Reminder::create([
            'send_to' => $request->send_to,
            'message' => $request->message,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'send_time' => $request->send_time,
            'next_send_time' => $request->start_date . ' ' . $request->send_time,
        ]);

        $sendMsg = new SendReminderMessage($reminder);
        $reselt = $sendMsg->handle();


        return redirect()->route('reminders.create')->with('success', 'Pengingat berhasil dibuat');
    }


    public function hapus($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();
        return back()->with('hapus-broadcast', 'Broadcast berhasil dihapus.');
    }
}
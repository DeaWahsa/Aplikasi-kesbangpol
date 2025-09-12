<?php

namespace App\Http\Controllers\Juara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\FcmToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Exception\FirebaseException;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $menu = 'Event';
        $submenu = '';

        return view('events.index', compact('events', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'Event';
        $submenu = '';

        return view('events.create', compact('menu', 'submenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $event = Event::create([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
        ]);

        $tokens = FcmToken::pluck('token')->toArray();

        foreach ($tokens as $token) {
            try {
                $message = CloudMessage::new()
                    ->withToken($token)
                    ->withNotification(Notification::create(
                        'Event Baru: ' . $event->nama_event,
                        $event->deskripsi ?? 'Ada event baru!'
                    ))
                    ->withData(['event_id' => $event->id]);

                app('firebase.messaging')->send($message);
            } catch (MessagingException | FirebaseException $e) {
                // Log error agar bisa diketahui jika gagal
                Log::error("Gagal mengirim notifikasi ke token {$token}: {$e->getMessage()}");
            }
        }

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil dibuat dan notifikasi terkirim!');
    }
}

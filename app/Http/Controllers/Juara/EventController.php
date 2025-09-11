<?php

namespace App\Http\Controllers\Juara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\FcmToken;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $menu = 'Event';
        $submenu = '';
        $data = [
            'events' => $events,
            'menu' => $menu,
            'submenu' => $submenu
        ];
        return view('events.index', $data);
    }

    public function create()
    {
        $menu = 'Event';
        $submenu = '';

        $data = [
            'menu' => $menu,
            'submenu' => $submenu
        ];
        return view('events.create', $data);
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
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification(Notification::create(
                'Event Baru: ' . $event->nama_event,
                $event->deskripsi ?? 'Ada event baru!'
            ))
            ->withData(['event_id' => $event->id]);

        app('firebase.messaging')->send($message);
    }

    return redirect()->route('events.index')
        ->with('success', 'Event berhasil dibuat dan notifikasi terkirim!');
}
}

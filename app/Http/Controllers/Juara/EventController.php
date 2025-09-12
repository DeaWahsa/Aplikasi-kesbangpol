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
use Kreait\Firebase\Messaging\MulticastMessage;

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

        if (!empty($tokens)) {
            try {
                $notification = Notification::create(
                    'Event Baru: ' . $event->nama_event,
                    $event->deskripsi ?? 'Ada event baru!'
                );

                // 🔥 Buat pesan
                $message = CloudMessage::new()
                    ->withNotification($notification)
                    ->withData([
                        'id' => (string) $event->id,
                        'click_action' => 'FLUTTER_NOTIFICATION_CLICK'
                    ]);

                $messaging = app('firebase.messaging');

                // ✅ Kirim ke banyak token
                $report = $messaging->sendMulticast($message, $tokens);

                Log::info("Notifikasi dikirim: {$report->successes()->count()} sukses, {$report->failures()->count()} gagal");

                // ✅ Cuma log token gagal, jangan hapus dulu
                foreach ($report->failures()->getItems() as $failure) {
                    $failedToken = $failure->target()->value();
                    Log::warning("Token gagal: {$failedToken}, error: " . $failure->error()->getMessage());
                }
            } catch (MessagingException | FirebaseException $e) {
                Log::error("Gagal mengirim notifikasi: {$e->getMessage()}");
            }
        }

        return redirect()->route('events.index')
            ->with('success', 'Event berhasil dibuat dan notifikasi dicoba dikirim!');
    }
}

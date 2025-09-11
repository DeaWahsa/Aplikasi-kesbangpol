<?php

namespace App\Http\Controllers\Juara;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class NotificationController extends Controller
{
     public function saveToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        /** @var User $user */
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user->fcm_token = $request->token;
        $user->save();

        return response()->json(['message' => 'Token saved']);
    }

    /**
     * Tambah event baru + kirim notifikasi ke semua user
     */
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $event = Event::create($request->all());

        $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

        foreach ($tokens as $token) {
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification(Notification::create(
                    'Event Baru: ' . $event->title,
                    $event->description ?? 'Ada event baru!'
                ))
                ->withData(['event_id' => $event->id]);

            app('firebase.messaging')->send($message);
        }

        return response()->json($event, 201);
    }

}

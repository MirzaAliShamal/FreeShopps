<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function chat()
    {
        $user = auth()->user();

        $threads = Thread::whereHas('participants', function($q) use($user) {
            $q->where('user_id', $user->id);
        })->get();

        return view('user.chat', get_defined_vars());
    }

    public function get(Request $req)
    {
        $user = auth()->user();
        $thread = Thread::find($req->id);

        return view('ajax.messages', get_defined_vars());
    }

    public function save(Request $req)
    {
        $user = auth()->user();

        $message = new Message();
        $message->thread_id = $req->thread_id;
        $message->user_id = $user->id;
        $message->body = $req->body;
        $message->type = 1;
        $message->save();

        // Pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['thread_id' => $message->thread_id];
        $pusher->trigger('my-channel', 'my-event', $data);

        return response()->json([
            'status' => true,
            'message' => 'Added',
        ]);
    }
}

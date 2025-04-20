<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = $user->following()->whereHas('followers', function ($q) use ($user) {
            $q->where('follower_id', $user->id);
        })->get();

        return view('messages.index', compact('conversations'));
    }

    public function chat($receiver_id)
    {
        $receiver = User::findOrFail($receiver_id);
        $messages = Message::where(function ($query) use ($receiver_id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $receiver_id);
        })
            ->orWhere(function ($query) use ($receiver_id) {
                $query->where('sender_id', $receiver_id)
                    ->where('receiver_id', auth()->id());
            })
            ->get();

        return view('messages.chat', compact('messages', 'receiver'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        return back();
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Crear el mensaje
        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.chat', $request->receiver_id);
    }
}

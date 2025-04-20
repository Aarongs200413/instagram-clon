<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Función para almacenar un post
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'image' => $imagePath,
            'caption' => $request->caption,
        ]);

        return redirect()->route('home');
    }

    // Función para comentar en un post
    public function comment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:200',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
            'comment' => $request->comment,
        ]);

        return back();
    }

    // Función para dar like a un post
    public function like($postId)
    {
        $post = Post::findOrFail($postId);

        // Verificar si el usuario ya ha dado like
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->first();

        if ($like) {
            // Si el usuario ya dio like, lo elimina
            $like->delete();
        } else {
            // Si no ha dado like, lo crea
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
            ]);
        }

        return back();
    }
}

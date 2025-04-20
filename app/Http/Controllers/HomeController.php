<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Traer todos los posts con su usuario (para mostrar el nombre)
        $posts = Post::with('user')->latest()->get();

        return view('home', compact('posts'));
    }
}

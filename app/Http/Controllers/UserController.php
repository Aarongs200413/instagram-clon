<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        // Obtén el usuario por su ID
        $user = User::with('followers', 'following', 'posts')->findOrFail($id);

        $followersCount = $user->followers->count();
        $followingCount = $user->following->count();

        return view('user.profile', compact('user', 'followersCount', 'followingCount'));
    }
    // Método para realizar la búsqueda de usuarios
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Búsqueda de usuarios por nombre o correo
        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        return view('search.results', compact('users', 'query'));
    }

    // Método para mostrar el formulario de búsqueda 
    public function searchForm()
    {
        return view('search');
    }

    // Método para mostrar el perfil de un usuario
    public function perfil($id)
    {
        $user = User::findOrFail($id);

        // Contar los seguidores y seguidos
        $followersCount = $user->followers->count();
        $followingCount = $user->following->count();

        $user = User::with('posts')->findOrFail($id);
        $following = $user->following;


        return view('user.profile', compact('user', 'followersCount', 'followingCount'));
    }

    // Método para seguir a un usuario
    public function follow($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() !== $user->id && !auth()->user()->isFollowing($user)) {
            auth()->user()->following()->attach($user->id);
        }
        return back();
    }

    public function unfollow($id)
    {
        $user = User::findOrFail($id);
        if (auth()->user()->isFollowing($user)) {
            auth()->user()->following()->detach($user->id);
        }
        return back();
    }
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validaciones para la imagen
        ]);

        $user = auth()->user();

        // Subir la nueva imagen de perfil
        if ($request->hasFile('profile_picture')) {
            // Eliminar la imagen anterior si existe
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Subir la nueva imagen
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Imagen de perfil actualizada correctamente');
    }
}

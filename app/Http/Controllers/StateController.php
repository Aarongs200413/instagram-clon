<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    public function show($id)
    {
        // Aquí podrías traer los detalles del estado desde la base de datos
        // Por ahora, para efectos de prueba, usaremos datos fijos
        $state = [
            'id' => $id,
            'image_url' => "https://i.pravatar.cc/100?img={$id}", // Imagen de ejemplo
            'user_name' => "Usuario {$id}",
            'description' => "Este es el estado del usuario {$id}.",
        ];

        return view('state.show', compact('state'));
    }
}

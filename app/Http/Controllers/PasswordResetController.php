<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\PasswordResetMail; // Asegúrate de importar el Mail correspondiente

class PasswordResetController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generar token único
        $token = Str::random(60);

        // Guardar o actualizar el token en la base de datos
        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        // Crear la URL con el token
        $resetUrl = url('/password/reset/' . $token . '?email=' . urlencode($request->email));

        // Enviar el correo con el enlace de restablecimiento
        Mail::to($request->email)->send(new PasswordResetMail($resetUrl)); // Descomentar esto

        // Redirigir con mensaje de éxito
        return back()->with('status', 'Se ha enviado el enlace de restablecimiento de contraseña.');
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth.passwords.reset', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        // Validación de los datos del formulario de restablecimiento
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        // Verificar el token
        $record = PasswordResetToken::where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        // Verificar si el token es válido o ha expirado
        if (!$record || Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['token' => 'Token inválido o expirado']);
        }

        // Actualizar la contraseña del usuario
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Eliminar el token de la base de datos
        PasswordResetToken::where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Contraseña restablecida correctamente.');
    }
}

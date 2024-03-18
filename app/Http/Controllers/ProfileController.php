<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\autor;
use App\Models\editorial;
use App\Models\genero;
use App\Models\libro;
use App\Models\User;
use App\Models\usuariosBloqueados;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function gestion()
    {
        $libros = libro::all();
        $autores = autor::all();
        $editoriales = editorial::all();
        $generos = genero::all();
        $usuarios = user::all();
        return view('dashboard', ['libros' => $libros, 'autores' => $autores, 'editoriales' => $editoriales, 'generos' => $generos, 'usuarios' => $usuarios]);
    }

    public function getUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    public function update2(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('nombreUsuario');
        $usuario->email = $request->input('email');
        $usuario->save();
        return redirect('dashboard');
    }



    public function destroy2(Request $request)
    {
        $usuario = User::find($request->id);

        // Verificar si el usuario tiene el rol de administrador
        if ($usuario->hasRole('admin')) {
            return back()->with('error', 'No tienes permisos para eliminar este usuario.');
        }

        if ($usuario->delete()) {
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'No se pudo eliminar el usuario.');
        }
    }

    public function bloquearUsuario($email)
    {
        $usuario = User::where('email', $email)->first();

        // Verificar si el usuario tiene el rol de administrador
        if ($usuario->hasRole('admin')) {
            return redirect('/dashboard')->with('error', 'No puedes bloquear a un administrador.');
        }

        // Guardar el email en la tabla usuarios_bloqueados
        $usuarioBloqueado = new usuariosBloqueados();
        $usuarioBloqueado->email = $email;
        $usuarioBloqueado->save();

        return redirect('/dashboard')->with('success', 'Usuario bloqueado correctamente.');
    }
}

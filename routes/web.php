<?php

use App\Http\Controllers\AutorController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\FormularioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LibroController::class, 'unLibroPorISBN']);
// Route::get('/{user}', [LibroController::class, 'show']);
Route::get('/filtrar', [FormularioController::class, 'index']);



Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user = Socialite::driver('google')->user();
    $user = User::updateOrCreate([
        'google_id' => $user->id,
    ], [
        'name' => $user->name,
        'email' => $user->email,
    ]);

    //return $user->hasRole('admin').' hola';
    if (!$user->hasRole('admin') ){
        $user->assignRole(2);
    }

    Auth::login($user);

    if (!$user->hasRole('admin') ){
        return redirect('/');
    }else{
        return redirect('/dashboard');
    }
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'gestion'])->name('dashboard');

    Route::post('/dashboard/añadirLibro', [LibroController::class, 'create'])->name('crearLibro');
    Route::get('/eliminarLibro/{id}', [LibroController::class, 'destroy']);
    Route::get('/dashboard/mostrarLibro/{id}', [LibroController::class, 'getLibro']);
    Route::put('/dashboard/editarLibro/{id}', [LibroController::class, 'update'])->name('updateLibro');

    Route::get('/eliminarAutor/{id}', [AutorController::class, 'destroy']);
    Route::get('/dashboard/mostrarAutor/{id}', [AutorController::class, 'getAutor']);
    Route::put('/dashboard/editarAutor/{id}', [AutorController::class, 'update'])->name('updateAutor');
    Route::post('/dashboard/añadirAutor', [AutorController::class, 'create'])->name('crearAutor');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

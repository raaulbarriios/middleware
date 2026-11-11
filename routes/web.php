<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/panel');
    }

    return back()->with('error', 'Credenciales incorrectas');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'age' => ['required', 'integer', 'min:1'],
        'password' => ['required', 'string', 'min:4'],
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'age' => $validated['age'],
        'is_admin' => false,
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect('/panel');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Rutas Privadas
|--------------------------------------------------------------------------
*/
Route::middleware('check.auth')->group(function () {
    // Habitación privada del usuario
    Route::get('/panel', function () {
        return view('panel-usuario');
    });

    // Casino: protegido por autenticación y edad mínima (18)
    Route::middleware('check.age')->group(function () {
        Route::get('/casino', function () {
            return view('casino');
        });
    });

    // Oficina de dirección: protegida por autenticación y rol de administrador
    Route::middleware('check.admin')->group(function () {
        Route::get('/admin', function () {
            return view('panel-admin');
        });
    });
});

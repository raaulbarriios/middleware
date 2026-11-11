@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="card">
    <h1>Iniciar Sesión</h1>
    <p class="description">Introduce tus credenciales para identificarte en el resort.</p>

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email', 'admin@resort.com') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="password123" required>
        </div>

        <button type="submit" class="btn">Ingresar al Resort</button>
    </form>

    <div class="info-box">
        <h3>Credenciales de prueba:</h3>
        <ul>
            <li><strong>Admin:</strong> admin@resort.com / password123</li>
            <li><strong>Adulto (+18):</strong> adulto@resort.com / password123</li>
            <li><strong>Menor (&lt;18):</strong> menor@resort.com / password123</li>
        </ul>
    </div>
</div>
@endsection

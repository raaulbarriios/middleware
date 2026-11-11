@extends('layouts.app')

@section('title', 'Registro de Huésped')

@section('content')
<div class="card">
    <h1>Registro de Huésped</h1>
    <p class="description">Crea una cuenta para registrarte en el complejo.</p>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="age">Edad (años)</label>
            <input type="number" id="age" name="age" min="1" max="120" value="{{ old('age') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn">Completar Registro</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Habitación Privada')

@section('content')
<div class="card">
    <h1>Habitación del Cliente</h1>
    <p class="description">Bienvenido a tu estancia privada en el Resort Digital.</p>

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="info-box" style="margin-top: 0; margin-bottom: 1.5rem;">
        <h3>Datos de tu perfil:</h3>
        <p style="margin-bottom: 0.3rem;"><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
        <p style="margin-bottom: 0.3rem;"><strong>Edad:</strong> {{ auth()->user()->age }} años</p>
        <p><strong>Rol:</strong> 
            @if(auth()->user()->is_admin)
                <span class="badge badge-admin">Administrador</span>
            @else
                <span class="badge badge-user">Cliente Estándar</span>
            @endif
        </p>
    </div>

    <div class="grid-links">
        <a href="{{ url('/casino') }}" class="btn">Acceder al Casino</a>
        <a href="{{ url('/admin') }}" class="btn btn-secondary">Oficina de Dirección</a>
    </div>
</div>
@endsection

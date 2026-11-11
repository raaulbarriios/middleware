@extends('layouts.app')

@section('title', 'Oficina de Dirección')

@section('content')
<div class="card" style="border-color: #7c3aed;">
    <h1 style="color: #c084fc;">🏢 Oficina de Dirección</h1>
    <p class="description">Acceso concedido. Has superado el filtro de privilegios administrativos (is_admin).</p>

    <div class="info-box" style="margin-top: 0; margin-bottom: 1.5rem; border-color: #4c1d95;">
        <p style="margin-bottom: 0.3rem;"><strong>Administrador:</strong> {{ auth()->user()->name }}</p>
        <p style="margin-bottom: 0.3rem;"><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Permiso:</strong> <span class="badge badge-admin">Acceso Total</span></p>
    </div>

    <div class="grid-links">
        <a href="{{ url('/panel') }}" class="btn btn-secondary">Volver a tu Habitación</a>
        <a href="{{ url('/') }}" class="btn">Ir al Inicio</a>
    </div>
</div>
@endsection

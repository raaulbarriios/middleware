@extends('layouts.app')

@section('title', 'Casino Exclusivo')

@section('content')
<div class="card" style="border-color: #d97706;">
    <h1 style="color: #fbbf24;">🎰 Casino Exclusivo</h1>
    <p class="description">Acceso concedido. Has superado el filtro de edad (+18).</p>

    <div class="info-box" style="margin-top: 0; margin-bottom: 1.5rem; border-color: #78350f;">
        <p style="margin-bottom: 0.3rem;"><strong>Jugador:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Edad verificada:</strong> {{ auth()->user()->age }} años</p>
    </div>

    <div class="grid-links">
        <a href="{{ url('/panel') }}" class="btn btn-secondary">Volver a tu Habitación</a>
        <a href="{{ url('/') }}" class="btn">Ir al Inicio</a>
    </div>
</div>
@endsection

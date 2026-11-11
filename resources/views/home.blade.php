@extends('layouts.app')

@section('title', 'Bienvenido al Resort')

@section('content')
<div class="card">
    <h1>Bienvenido al Resort Digital</h1>
    <p class="description">Accede a las distintas zonas del complejo usando la barra de navegación o los accesos directos.</p>

    <div class="grid-links">
        <a href="{{ url('/panel') }}" class="btn">Habitación Privada</a>
        <a href="{{ url('/casino') }}" class="btn btn-secondary">Casino (+18)</a>
    </div>

    <div style="margin-top: 1rem;">
        <a href="{{ url('/admin') }}" class="btn btn-secondary">Oficina de Dirección (Admin)</a>
    </div>

    @guest
        <div class="info-box">
            <h3>Cuentas de prueba disponibles en la base de datos:</h3>
            <ul>
                <li><strong>Admin (35 años):</strong> admin@resort.com / password123</li>
                <li><strong>Adulto normal (25 años):</strong> adulto@resort.com / password123</li>
                <li><strong>Menor de edad (16 años):</strong> menor@resort.com / password123</li>
            </ul>
        </div>
    @endguest
</div>
@endsection

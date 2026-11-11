<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resort Digital')</title>
    <style>
        :root {
            --bg-body: #0b1120;
            --bg-card: #1e293b;
            --bg-input: #0f172a;
            --border: #334155;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --danger-bg: #450a0a;
            --danger-border: #dc2626;
            --danger-text: #fca5a5;
            --success-bg: #052e16;
            --success-border: #16a34a;
            --success-text: #86efac;
            --gold: #f59e0b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #0f172a;
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.25rem;
            font-weight: 700;
            color: #38bdf8;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        nav {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        nav a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.95rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        nav a:hover, nav a.active {
            color: #ffffff;
            background-color: var(--border);
        }

        .user-tag {
            background-color: var(--border);
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            color: #cbd5e1;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2.5rem 1rem;
        }

        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 580px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        p.description {
            color: var(--text-muted);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .alert-error {
            background-color: var(--danger-bg);
            border: 1px solid var(--danger-border);
            color: var(--danger-text);
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #cbd5e1;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 0.65rem 0.85rem;
            background-color: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 6px;
            color: #ffffff;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: var(--primary);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 0.7rem 1.2rem;
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.95rem;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background-color: var(--primary-hover);
        }

        .btn-secondary {
            background-color: #334155;
            color: #f1f5f9;
        }

        .btn-secondary:hover {
            background-color: #475569;
        }

        .btn-danger {
            background-color: #b91c1c;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #991b1b;
        }

        .grid-links {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .info-box {
            background-color: #0f172a;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            font-size: 0.85rem;
        }

        .info-box h3 {
            color: #38bdf8;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .info-box ul {
            list-style-type: none;
        }

        .info-box li {
            padding: 0.25rem 0;
            color: var(--text-muted);
        }

        .badge {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-admin {
            background-color: #7c3aed;
            color: #ede9fe;
        }

        .badge-user {
            background-color: #0284c7;
            color: #e0f2fe;
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ url('/') }}" class="logo">
            <span>🏝️</span> Resort Digital
        </a>
        <nav>
            <a href="{{ url('/') }}">Inicio</a>
            @auth
                <a href="{{ url('/panel') }}">Mi Habitación</a>
                <a href="{{ url('/casino') }}">Casino</a>
                @if(auth()->user()->is_admin)
                    <a href="{{ url('/admin') }}">Dirección</a>
                @endif
                <span class="user-tag">{{ auth()->user()->name }} ({{ auth()->user()->age }} años)</span>
                <form method="POST" action="{{ url('/logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#ef4444; cursor:pointer; font-size:0.9rem; padding: 0.4rem 0.6rem;">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
                <a href="{{ url('/register') }}">Registro</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>


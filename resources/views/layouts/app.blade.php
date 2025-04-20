<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Instagram</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">InstaClon</a>
            <div class="d-flex">
                @auth
                    <span class="me-2">Hola, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Cerrar sesión</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Registro</a>
                @endguest
            </div>
        </div>
    </nav>
    <!-- Panel deslizante de búsqueda -->
<div id="searchPanel" class="offcanvas-panel">
    <div class="offcanvas-header">
        <h5 class="mb-0">Buscar Usuarios</h5>
        <button id="closeSearchPanelBtn" class="btn-close">&times;</button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <input type="text" name="query" placeholder="Buscar por nombre o correo" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-2 w-100">Buscar</button>
        </form>
    </div>
</div>

    <main class="container">
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

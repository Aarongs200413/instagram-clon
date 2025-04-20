<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .state-container {
            width: 468px;
            height: 585px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin: 40px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .state-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .state-header,
        .state-footer {
            position: absolute;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
            z-index: 2;
        }

        .state-header {
            top: 0;
        }

        .state-footer {
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), transparent);
            justify-content: center;
        }

        .state-header img {
            width: 32px;
            height: 32px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .state-header span {
            color: #fff;
            font-weight: 500;
            font-size: 14px;
        }

        .state-footer p {
            color: #fff;
            font-size: 14px;
            margin: 0;
            text-align: center;
        }

        /* Logo de Instagram alineado a la izquierda */
        .instagram-logo {
            width: 50px;
            height: 50px;
            margin-left: 15px;
        }

        .header-logo-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .header-logo-container a {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="header-logo-container">
        <a href="{{ route('home') }}">
            <img src="{{asset('assets/Instagram-Logo-2016-present.png')}}" alt="Instagram Logo" class="instagram-logo" style="width: 100px; height: auto;">
        </a>
    </div>
    @yield('content')
</body>
</html>

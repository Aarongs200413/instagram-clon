<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

    @include('components.sidebar')

    <div class="container-fluid" style="margin-left: 260px; margin-right: 320px; padding-top: 20px;">
        @yield('content')
    </div>

    @include('components.sugerencias')

</body>
</html>

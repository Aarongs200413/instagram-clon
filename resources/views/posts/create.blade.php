@extends('layouts.profile')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 500px;">
        <h2 class="text-center mb-4">Crear nueva publicación</h2>

        <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Imagen -->
            <div class="mb-3">
                <label for="image" class="form-label">Selecciona una imagen</label>
                <input class="form-control" type="file" name="image" id="image" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="caption" class="form-label">Descripción (opcional)</label>
                <textarea class="form-control" name="caption" id="caption" rows="3" placeholder="¿Qué estás pensando?"></textarea>
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
        </form>
    </div>
</div>
@endsection

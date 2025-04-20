@extends('layouts.profile')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center mb-4">
        <!-- Imagen de perfil -->
        <form action="{{ route('user.updateProfilePicture') }}" method="POST" enctype="multipart/form-data" class="position-relative me-4">
            @csrf
            <label for="profile_picture" style="cursor: pointer;">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto de perfil" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </label>
            <input type="file" name="profile_picture" id="profile_picture" class="d-none" onchange="this.form.submit()">
        </form>

        <!-- Info de perfil -->
        <div>
            <div class="d-flex align-items-center mb-2">
                <h4 class="me-3">{{ $user->username }}</h4>

                <!-- Botones -->
                @if(auth()->id() === $user->id)
                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">Editar perfil</a>
                    <a href="#" class="btn btn-outline-secondary btn-sm">Ver archivo</a>
                @else
                    @if(auth()->user()->following->contains($user->id))
                        <form action="{{ route('user.unfollow', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Dejar de seguir</button>
                        </form>
                    @else
                        <form action="{{ route('user.follow', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Seguir</button>
                        </form>
                    @endif
                @endif
            </div>

            <!-- Conteo de publicaciones, seguidores y seguidos -->
            <div class="d-flex mb-2">
                <div class="me-4"><strong>{{ $user->posts->count() }}</strong> publicaciones</div>
                <div class="me-4"><strong>{{ $followersCount }}</strong> seguidores</div>
                <div><strong>{{ $followingCount }}</strong> seguidos</div>
            </div>

            <!-- Nombre y biografía -->
            <div>
                <strong>{{ $user->name }}</strong><br>
                <p>{{ $user->bio ?? 'No hay bio disponible.' }}</p>
            </div>
        </div>
    </div>

    <!-- Publicaciones -->
    <hr>
    <h5 class="mb-3">Publicaciones</h5>
    <div class="row">
        @forelse($user->posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Publicación" style="object-fit: cover; height: 300px;">
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ $post->caption }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay publicaciones aún.</p>
        @endforelse
    </div>
</div>


@endsection

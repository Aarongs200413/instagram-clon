@extends('layouts.profile')

@section('content')
<div class="container">
    <h2>Buscar Usuarios</h2>

    <!-- Formulario de búsqueda con ícono de lupa -->
    <form action="{{ route('search') }}" method="POST" class="d-flex align-items-center mt-3">
        @csrf
        <div class="input-group">
            <input type="text" name="query" placeholder="Buscar por nombre o correo" class="form-control" required>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> <!-- Ícono de lupa -->
            </button>
        </div>
    </form>
    
    @if(isset($users))
        <h3 class="mt-4">Resultados para: "{{ $query }}"</h3>
        <ul class="list-group mt-3">
            @forelse($users as $user)
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('default-avatar.png') }}" 
                         alt="Avatar" 
                         class="rounded-circle" 
                         style="width: 40px; height: 40px; margin-right: 10px;">
                    <a href="{{ route('user.show', $user->id) }}" class="text-dark font-weight-bold">Ver perfil</a>
                </li>
            @empty
                <li class="list-group-item">No se encontraron usuarios.</li>
            @endforelse
        </ul>
    @endif    
</div>
<div class="container mt-3">
    <h2>Busca amigos con los que puedas compartir</h2>
    <p>Encuentra personas que conoces y empieza a seguirlas.</p>
    <p>Usa la barra de búsqueda para encontrar amigos por su nombre o correo electrónico.</p>
    <div class="container justify-content-center d-flex">
        <img src="{{asset('assets/grupo-personas-viendo-videos-graciosos-riendo-dibujos-animados_1284-33366.avif')}}" style="border-radius:1em;" alt="Grupo de personas viendo videos graciosos" class="img-fluid">
    </div>
</div>
@include('layouts.footer')
@endsection

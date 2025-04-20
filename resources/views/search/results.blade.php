@extends('layouts.profile')

@section('content')
<div class="container">
    <h2>Resultados de la búsqueda</h2>

    @if(isset($users) && $users->count() > 0)
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('default-avatar.png') }}" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                    <span>{{ $user->name }} ({{ $user->email }})</span>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary ms-auto">Ver perfil</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron resultados.</p>
    @endif
</div>
@endsection

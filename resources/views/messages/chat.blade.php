@extends('layouts.profile')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Conversación con {{ $receiver->name }}</h4>

    <!-- Sección de mensajes -->
    <div class="border p-3 mb-3" style="height: 350px; overflow-y: scroll; background-color: #f9f9f9; border-radius: 8px;">
        @foreach($messages as $msg)
            <div class="mb-3">
                <div class="d-flex {{ $msg->sender_id == auth()->id() ? 'justify-content-end' : '' }}">
                    <!-- Avatar de quien envía el mensaje -->
                    <img src="{{ $msg->sender->profile_picture ? asset('storage/'.$msg->sender->profile_picture) : 'https://i.pravatar.cc/40' }}" 
                         alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">

                    <div class="d-flex flex-column">
                        <!-- Mensaje -->
                        <div class="p-2 rounded {{ $msg->sender_id == auth()->id() ? 'bg-primary text-white' : 'bg-light' }}" style="max-width: 70%; word-wrap: break-word;">
                            <strong>{{ $msg->sender->name }}:</strong> 
                            <span>{{ $msg->content }}</span>
                        </div>
                        <small class="text-muted text-end">{{ $msg->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Formulario para enviar mensaje -->
    <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <div class="input-group">
            <input type="text" name="content" class="form-control" placeholder="Escribe un mensaje..." required>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
</div>

@endsection

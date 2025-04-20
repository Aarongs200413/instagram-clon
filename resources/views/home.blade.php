@extends('layouts.home')

@section('content')
    @include('components.estados')

    <div class="d-flex flex-column align-items-start mt-4" style="margin-left: 100px;">
        @foreach ($posts as $post)
            <div class="mb-5" style="width: 470px;">
                {{-- Encabezado del post: usuario --}}
                <div class="d-flex align-items-center p-3">
                    <img src="{{ $post->user->profile_picture ? asset('storage/' . $post->user->profile_picture) : 'https://i.pravatar.cc/24' }}"
                         class="rounded-circle me-2" 
                         alt="Avatar" 
                         width="40" 
                         height="40">
                    <strong>{{ $post->user->name }}</strong>
                </div>
    
                {{-- Imagen del post --}}
                <div class="text-center" style="max-width: 468px; max-height: 585px; overflow: hidden; border-radius: 5px;">
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         alt="Post Image" 
                         style="width: 100%; height: auto; object-fit: cover;">
                </div>
    
                {{-- Likes, comentarios y formulario --}}
                <div class="p-3">
                    <form action="{{ route('post.like', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-decoration-none text-dark">
                            <!-- SVG del corazón -->
                            <svg aria-label="Me gusta" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Me gusta</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                            {{ $post->likes->count() }} Me gusta{{ $post->likes->count() != 1 ? '(s)' : '' }}
                        </button>
                    </form>
    
                    {{-- Comentarios --}}
                    <div class="mt-2">
                        @foreach ($post->comments as $comment)
                            <p class="mb-1" style="font-size: 13px;">
                                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                            </p>
                        @endforeach
                    </div>
    
                    {{-- Formulario de comentarios --}}
                    <form action="{{ route('post.comment', $post->id) }}" method="POST" class="mt-2">
                        @csrf
                        <div class="d-flex border-top pt-3">
                            <input type="text"
                                   name="comment"
                                   class="form-control border-0 shadow-none p-0"
                                   placeholder="Añade un comentario..."
                                   style="font-size: 14px;"
                                   required>
                            <button type="submit"
                                    class="btn btn-link text-primary text-decoration-none px-3"
                                    style="font-size: 14px; color:#0095f6;">
                                Publicar
                            </button>
                        </div>
                    </form>
                </div>
                <div style="height: 1px; background-color: #ccc; width: 460px;"></div>
            </div>
            
        @endforeach
    </div>
@endsection
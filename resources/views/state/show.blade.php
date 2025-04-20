@extends('layouts.state')

@section('content')
    <div class="state-container">
        <img src="{{ $state['image_url'] }}" alt="Estado" class="state-image">

        {{-- Header con avatar y nombre --}}
        <div class="state-header">
            <img src="https://i.pravatar.cc/40?u={{ uniqid() }}" alt="User Avatar">
            <span>{{ $state['user_name'] }}</span>
        </div>

        {{-- Footer con descripción --}}
        <div class="state-footer">
            <p>{{ $state['description'] }}</p>
        </div>
    </div>
@endsection

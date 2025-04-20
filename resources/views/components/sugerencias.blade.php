<div class="position-fixed" style="right: 20px; top: 80px; width: 300px;">
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('perfil.usuario', Auth::user()->id) }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://i.pravatar.cc/50?img=12' }}" 
            class="rounded-circle me-2" 
            width="50" 
            height="50">
            <div>
                <strong>{{ Auth::user()->name }}</strong>
                <div class="text-muted small">{{ Auth::user()->email }}</div>
            </div>
        </a>
    </div>

    <div class="mb-2 d-flex justify-content-between">
        <span class="text-muted">Sugerencias para ti</span>
        <a href="#" class="text-decoration-none">Ver todo</a>
    </div>

    @for ($i = 1; $i <= 5; $i++)
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center">
                <img src="https://i.pravatar.cc/40?img={{ $i+30 }}" class="rounded-circle me-2" width="40" height="40">
                <div>
                    <strong>usuario{{ $i }}</strong>
                    <div class="text-muted small">Nuevo en Instagram</div>
                </div>
            </div>
            <a href="#" class="text-primary text-decoration-none">Seguir</a>
        </div>
    @endfor
</div>

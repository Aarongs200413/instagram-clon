<div class="d-flex gap-3 px-3 py-2 flex-wrap">
    @for ($i = 0; $i < 7; $i++)
        <div class="text-center" style="width: 70px;">
            <a href="{{ route('state.show', ['id' => $i]) }}" class="d-block">
                <img src="https://i.pravatar.cc/60?img={{ $i+1 }}" class="rounded-circle border p-1" alt="estado">
            </a>
            <small class="d-block mt-1">Usuario {{ $i + 1 }}</small>
        </div>
    @endfor
</div>

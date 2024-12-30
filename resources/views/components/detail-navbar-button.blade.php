<div class="gap-2 py-2 mb-3 d-flex">
    @foreach ($buttons as $button)
        @php
            // Tentukan apakah route saat ini sama dengan route tombol
            $isActive = Route::currentRouteName() == $button['route'];
            // Tentukan kelas berdasarkan apakah aktif atau tidak
            $buttonClass = $isActive ? 'btn-primary' : 'btn-secondary';
            // Tentukan jumlah badge jika ada
            $badgeCount = $button['badge'] ?? null;
        @endphp
        <a href="{{ route($button['route'], $button['params'] ?? []) }}" class="btn {{ $buttonClass }} btn-md">
            {{ $button['icon'] }} {{ $button['label'] }}
            @if ($badgeCount)
                <span class="bg-transparent badge">{{ $badgeCount }}</span>
            @endif
        </a>
    @endforeach
</div>

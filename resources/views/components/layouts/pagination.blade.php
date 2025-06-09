<div class="pagination-container">
    <div class="pagination-info">
        Menampilkan {{ $tables->firstItem() }}-{{ $tables->lastItem() }} dari
        {{ $tables->total() }}
        data
    </div>
    <div class="pagination">
        {{-- Tombol Previous --}}
        <button class="pagination-btn" {{ $tables->onFirstPage() ? 'disabled' : '' }}
            onclick="window.location='{{ $tables->previousPageUrl() }}'">
            <i class="fas fa-chevron-left"></i>
        </button>

        {{-- Nomor Halaman --}}
        @for ($i = 1; $i <= $tables->lastPage(); $i++)
            <button class="pagination-btn {{ $tables->currentPage() == $i ? 'active' : '' }}"
                onclick="window.location='{{ $tables->url($i) }}'">
                {{ $i }}
            </button>
        @endfor

        {{-- Tombol Next --}}
        <button class="pagination-btn" {{ !$tables->hasMorePages() ? 'disabled' : '' }}
            onclick="window.location='{{ $tables->nextPageUrl() }}'">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

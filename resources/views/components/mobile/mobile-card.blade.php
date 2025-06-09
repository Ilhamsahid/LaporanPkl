@props([
    'headers' => [],
    'rows' => [],
    'fields' => [],
    'counts' => [],
    'mobileActions' => null,
])

@forelse ($rows as $row)
    <div class="mobile-card">
        <div class="mobile-card-header">
            @if ($headers)
                {!! $headers($row) !!}
            @endif
        </div>
        @foreach ($fields as $label => $field)
            <div class="mobile-card-body">
                <div class="mobile-card-item mb-4">
                    @php
                        $value = is_callable($field) ? $field($row) : data_get($row, $field, '-');
                    @endphp
                    <div class="mobile-card-label">{{ $label }}</div>
                    <div class="mobile-card-value">{{ $value }}</div>
                </div>
            </div>
        @endforeach
        @if ($mobileActions)
            {!! $mobileActions($row) !!}
        @endif
    </div>
@empty
    <div class="d-md-none" style="text-align:center; font-style: italic; color: var(--text-secondary);">
        Tidak ditemukan
    </div>
@endforelse

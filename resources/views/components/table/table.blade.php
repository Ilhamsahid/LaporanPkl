@props([
    'columns' => [],
    'fields' => [],
    'rows' => [],
    'count' => [],
    'desktopActions' => null,
])

<div class="table-container hidden-mobile">
    <table class="table">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach

                @if ($desktopActions)
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($rows as $row)
                <tr>
                    @foreach ($fields as $field)
                        <td>
                            @php
                                $value = is_callable($field) ? $field($row) : data_get($row, $field, '-');
                            @endphp

                            @if (is_string($field) && Str::endsWith($field, '_formatted'))
                                {!! $value !!}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach

                    @if ($count)
                        <td>
                            <span class="badge badge-primary">{{ $count($row) }}</span>
                        </td>
                    @endif

                    @if ($desktopActions)
                        <td>
                            {!! $desktopActions($row) !!}
                        </td>
                    @endif

                </tr>
            @empty
                <tr class="d-md-block">
                    <td colspan="6" style="text-align:center; font-style: italic; color: var(--text-secondary);">
                        Tidak ditemukan
                    </td>
                </tr>
            @endforelse
            <tr class="no-results-message" style="display:none;">
                <td colspan="6" style="text-align:center; font-style: italic; color: var(--text-secondary);">
                    Tidak ditemukan
                </td>
            </tr>
        </tbody>
    </table>
</div>

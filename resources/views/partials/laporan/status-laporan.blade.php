@if ($laporan->status == 'pending')
    <span class="badge badge-warning">{{ $laporan->status }}</span>
@elseif ($laporan->status == 'selesai')
    <span class="badge badge-success">{{ $laporan->status }}</span>
@endif
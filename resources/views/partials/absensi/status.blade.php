@if ($absensi->status == 'hadir')
    <span class="badge badge-success">{{ $absensi->status }}</span>
@elseif ($absensi->status == 'alpha')
    <span class="badge badge-danger">{{ $absensi->status }}</span>
@else
    <span class="badge badge-warning">{{ $absensi->status }}</span>
@endif
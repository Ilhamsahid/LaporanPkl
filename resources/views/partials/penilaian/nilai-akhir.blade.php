@if ($penilaian->nilai_akhir >= 90 && $penilaian->nilai_akhir < 100)
    <span class="badge badge-success">{{ $penilaian->nilai_akhir }}</span>
@elseif ($penilaian->nilai_akhir >= 85 && $penilaian->nilai_akhir < 90)
    <span class="badge badge-warning">{{ $penilaian->nilai_akhir }}</span>
@endif
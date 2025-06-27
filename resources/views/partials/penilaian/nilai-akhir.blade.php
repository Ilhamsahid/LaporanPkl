@if ($row->penilaian->nilai_akhir ?? '-' >= 90 && $row->penilaian->nilai_akhir < 100 ?? '-')
    <span class="badge badge-success">{{ $row->penilaian->nilai_akhir ?? '-' }}</span>
@elseif ($row->penilaian->nilai_akhir ?? '-'>= 85 && $row->penilaian->nilai_akhir < 90 ?? '-')
    <span class="badge badge-warning">{{ $row->penilaian->nilai_akhir ?? '-' }}</span>
@endif
<?php
return [
    'mobileHeaders' => fn($row) => view('partials.penilaian.nama-mobile', ['penilaian' => $row]),

    'mobileFields' => array_filter([
        'Nilai Akhir:' => fn($row) => view('partials.penilaian.nilai-akhir', ['row' => $row]),
        'Etika:' => 'penilaian.nilai_etika',
        'Kedisplinan:' => 'penilaian.nilai_kedisplinan',
        'Keterampilan:' => 'penilaian.nilai_keterampilan',
        'Wawasan:' => 'penilaian.nilai_wawasan',
        'Pembimbing:' => getCurrentGuard() != 'pembimbing' ? 'penilaian.siswa.pembimbing.nama' : '',
    ]),

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row->penilaian ?? $row,
        'penilaian' => $row->penilaian,
        'name_modal' => 'penilaian-modal',
    ]),

    'desktopColumns' => getCurrentGuard() != 'pembimbing'
    ? ['Nama Siswa', 'Etika', 'Kedisplinan', 'Keterampilan', 'Wawasan', 'Nilai Akhir', 'Pembimbing']
    : ['Nama Siswa', 'Etika', 'Kedisplinan', 'Keterampilan', 'Wawasan', 'Nilai Akhir'],

    'desktopFields' => array_filter([
        fn($row) => view('partials.penilaian.nama', ['penilaian' => $row]),
        fn($row) => $row->penilaian->nilai_etika ?? '-',
        fn($row) => $row->penilaian->nilai_kedisplinan ?? '-',
        fn($row) => $row->penilaian->nilai_keterampilan ?? '-',
        fn($row) => $row->penilaian->nilai_wawasan ?? '-',
        fn($row) => view('partials.penilaian.nilai-akhir', ['row' => $row]),
        getCurrentGuard() != 'pembimbing' ? 'pembimbing.nama' : ''
    ]),

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row->penilaian ?? $row,
        'penilaian' => $row->penilaian,
        'name_modal' => 'penilaian-modal',
    ]),
];

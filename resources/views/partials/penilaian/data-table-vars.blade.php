<?php
return [
    'mobileHeaders' => fn($row) => view('partials.penilaian.nama-mobile', ['penilaian' => $row]),

    'mobileFields' => [
        'Nilai Akhir:' => 'nilai_akhir',
        'Etika:' => 'nilai_etika',
        'Kedisplinan:' => 'nilai_kedisplinan',
        'Keterampilan:' => 'nilai_kedisplinan',
        'Wawasan:' => 'nilai_wawasan',
        'Pembimbing:' => 'siswa.pembimbing.nama',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'penilaian-modal',
    ]),

    'desktopColumns' => ['Nama Siswa', 'Etika', 'Kedisplinan', 'Keterampilan', 'Wawasan', 'Nilai Akhir', 'Pembimbing'],

    'desktopFields' => [
        fn($row) => view('partials.penilaian.nama', ['penilaian' => $row]),
        'nilai_etika',
        'nilai_kedisplinan',
        'nilai_keterampilan',
        'nilai_wawasan',
        fn($row) => view('partials.penilaian.nilai-akhir', ['penilaian' => $row]),
        'siswa.pembimbing.nama'
    ],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'penilaian-modal',
    ]),
];

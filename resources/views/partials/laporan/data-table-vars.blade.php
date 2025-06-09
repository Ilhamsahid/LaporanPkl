<?php
return [
    'mobileHeaders' => fn($row) => view('partials.laporan.judul-laporan-mobile', ['laporan' => $row]),

    'mobileFields' => [
        'Siswa:' => 'siswa.nama',
        'Tanggal:' => 'tanggal',
        'Pembimbing' => 'siswa.pembimbing.nama',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'laporan-modal',
    ]),

    'desktopColumns' => ['Judul Laporan', 'Siswa', 'Tanggal', 'Jenis', 'Pembimbing'],

    'desktopFields' => [
        fn($row) => view('partials.laporan.judul-laporan', ['laporan' => $row]),
        'siswa.nama',
        'tanggal',
        fn($row) => view('partials.laporan.span', ['laporan' => $row]),
        'siswa.pembimbing.nama'
    ],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'laporan-modal',
    ]),
];

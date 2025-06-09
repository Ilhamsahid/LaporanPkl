<?php
return [
    'mobileHeaders' => fn($row) => view('partials.absensi.nama-mobile', ['absensi' => $row]),

    'mobileFields' => [
        'Tanggal:' => 'tanggal',
        'Jam Masuk:' => 'jam_masuk',
        'Jam Keluar:' => 'jam_keluar',
        'Tempat PKL:' => 'siswa.tempatPkl.nama_tempat',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'absensi-modal',
    ]),

    'desktopColumns' => ['Nama Siswa', 'Tanggal', 'Absen Masuk', 'Absen Keluar', 'Status', 'Keterangan', 'Tempat PKL'],

    'desktopFields' => [
        fn($row) => view('partials.absensi.nama', ['absensi' => $row]),
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        fn($row) => view('partials.absensi.status', ['absensi' => $row]),
        'keterangan',
        'siswa.tempatPkl.nama_tempat',
    ],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'absensi-modal',
    ]),
];

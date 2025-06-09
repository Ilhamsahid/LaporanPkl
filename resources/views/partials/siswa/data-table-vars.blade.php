<?php
return [
    'mobileHeaders' => fn($row) => view('partials.siswa.nama-mobile', ['row' => $row])->render(),

    'mobileFields' => [
        'Email:' => 'email',
        'Telepon:' => 'telepon',
        'Pembimbing:' => 'pembimbing.nama',
        'Tempat PKL:' => 'tempatPkl.nama_tempat',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'siswa-modal',
    ])->render(),

    'desktopColumns' => ['Nama', 'Email', 'Telepon', 'Pembimbing', 'Tempat PKL'],

    'desktopFields' => [
        fn($row) => view('partials.siswa.nama', ['siswa' => $row]),
        'email',
        'telepon',
        'pembimbing.nama',
        'tempatPkl.nama_tempat',
    ],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'siswa-modal',
    ])->render(),
];
<?php
return [
    'mobileHeaders' => fn($row) => view('partials.siswa.nama-mobile', ['row' => $row])->render(),

    'mobileFields' => array_filter([
        'Email:' => 'email',
        'Telepon:' => 'telepon',
        'Pembimbing:' => getCurrentGuard() == 'pembimbing' ? null : 'pembimbing.nama',
        'Tempat PKL:' => 'tempatPkl.nama_tempat',
    ]),

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'siswa-modal',
    ])->render(),

    'desktopColumns' => getCurrentGuard() == 'pembimbing'
                        ? ['Nama', 'Email', 'Telepon', 'Tempat PKL']
                        : ['Nama', 'Email', 'Telepon', 'Pembimbing', 'Tempat PKL'],

    'desktopFields' => array_filter([
        fn($row) => view('partials.siswa.nama', ['siswa' => $row]),
        'email',
        'telepon',
        getCurrentGuard() == 'pembimbing' ? null : 'pembimbing.nama',
        'tempatPkl.nama_tempat',
    ]),

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'siswa-modal',
    ])->render(),
];
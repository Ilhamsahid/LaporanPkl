<?php
return [
    'mobileHeaders' => fn($row) => view('partials.pembimbing.nama-mobile', ['row' => $row]),

    'mobileFields' => [
        'NIP:' => 'nip',
        'Email:' => 'email',
        'Alamat:' => 'alamat',
        'Telepon:' => 'telepon',
        'Jumlah:' => fn($row) => count($row->siswa) . ' siswa',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'pembimbing-modal',
    ]),

    'desktopColumns' => ['Nama', 'Nip', 'Email', 'Alamat', 'Telepon', 'Jumlah Siswa'],

    'desktopFields' => [fn($row) => view('partials.pembimbing.nama', ['pembimbing' => $row]),
        'nip',
        'email',
        'alamat',
        'telepon',
        fn($row) => view('partials.pembimbing.jumlah-siswa', ['pembimbing' => $row])
    ],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'pembimbing-modal',
    ]),
];

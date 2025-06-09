<?php
return [
    'mobileHeaders' => fn($row) => view('partials.tempat-pkl.nama-mobile', ['tempatPkl' => $row]),

    'mobileFields' => [
        'Alamat:' => 'alamat',
        'Telepon:' => 'telepon',
        'Email:' => 'email',
        'Siswa PKL:' => fn($row) => count($row->siswa) . ' siswa',
    ],

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'tempatPkl-modal',
    ]),

    'desktopColumns' => ['Nama Perusahaan', 'Alamat', 'Telepon', 'Email', 'Siswa Pkl'],

    'desktopFields' => [fn($row) => view('partials.tempat-pkl.nama', ['tempatPkl' => $row]), 'alamat', 'telepon', 'email', fn($row) => view('partials.tempat-pkl.span', ['tempatPkl' => $row])],

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'tempatPkl-modal',
    ]),
];

<?php
return [
    'mobileHeaders' => fn($row) => view('partials.laporan.judul-laporan-mobile', ['laporan' => $row]),

    'mobileFields' => array_filter([
        'Siswa:' => 'siswa.nama',
        'Tanggal:' => 'tanggal',
        'Pembimbing:' => getCurrentGuard() == 'pembimbing' ? null : 'siswa.pembimbing.nama',
        'Status:' => fn($row) => view('partials.laporan.status-laporan', ['laporan' => $row])
    ]),

    'mobileActions' => fn($row) => view('components.mobile.actions-mobile', [
        'row' => $row,
        'name_modal' => 'laporan-modal',
    ]),

    'desktopColumns' => getCurrentGuard() != 'pembimbing'
    ? ['Judul Laporan', 'Siswa', 'Tanggal', 'Jenis', 'Status','Pembimbing']
    : ['Judul Laporan', 'Siswa', 'Tanggal', 'Jenis', 'Status'],

    'desktopFields' => array_filter([
        fn($row) => view('partials.laporan.judul-laporan', ['laporan' => $row]),
        'siswa.nama',
        'tanggal',
        fn($row) => view('partials.laporan.jenis-laporan', ['laporan' => $row]),
        fn($row) => view('partials.laporan.status-laporan', ['laporan' => $row]),
        getCurrentGuard() == 'pembimbing' ? '' : 'siswa.pembimbing.nama',
    ]),

    'desktopActions' => fn($row) => view('components.buttons.actions', [
        'row' => $row,
        'name_modal' => 'laporan-modal',
    ]),
];

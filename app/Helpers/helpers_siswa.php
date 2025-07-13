<?php

if(!function_exists('absenAutoIfExpired')){
    function absenAutoIfExpired($now, $absensi, $props){
        $iscreated = getAbsensiData($absensi);
        $login = getAbsensiBySiswaId($absensi);
        if ($now > '17:00:00' && count($iscreated) < 1){
            $login::create([
                'siswa_id' => Auth::user()->id,
                'tanggal' => now(),
                'status' => 'alpha',
            ]);

            return defaultPropsHandleLogin($props, 'Alpha', $login);
        }
    }
}

if(!function_exists('defaultPropsHandleLogin')){
    function defaultPropsHandleLogin($props, $type, $absensiSiswa){
        $data = getAbsensiData($absensiSiswa);
        $login = getAbsensiBySiswaId($absensiSiswa);
        $islogin = $login->tanggal >= now()->format('Y-m-d');
        $islogout = $login->jam_keluar;
        $isAlpha = $data[0] ?? null ? $data[0]->status == 'alpha' : '';

        return [
            'btn' => !$islogin ? $props['btn'] : ($type == 'masuk' || $islogout || $isAlpha ? 'btn btn-secondary' : 'btn btn-primary'),
            'time' => !$islogin ? $props['time'] : ($type == 'masuk' || $islogout ? $login['jam_'.$type] : '--:--'),
            'text' => !$islogin ? $props['text'] : ($type == 'masuk' || $islogout || $isAlpha ? '--success-500' : '--text-secondary'),
            'icon' => !$islogin ? $props['icon'] : ($type == 'masuk' || $islogout || $isAlpha? '--success-500' : '--text-secondary'),
            'access' => !$islogin ? $props['access'] : ($type == 'masuk' || $islogout || $isAlpha ? 'disabled' : 'active'),
        ];
    }
}

if(!function_exists('getAbsensiBySiswaId')){
    function getAbsensiBySiswaId($siswa){
        return $siswa::with('siswa')
            ->where('siswa_id', Auth::user()->id)
            ->latest('tanggal')
            ->first();
    }
}

if(!function_exists('getAbsensiData')){
    function getAbsensiData($siswa){
        return $siswa::with('siswa')
            ->where('tanggal', now()->format('Y-m-d'))
            ->get();
    }
}


if(!function_exists('isTerlambat')){
    function isTerlambat($jam){
        return strtotime($jam) > strtotime('09:00') && strtotime($jam) < strtotime('19:00');
    }
}

if(!function_exists('handleUI')){
    function handleUI($props, $btn, $type, $absensi){
        $props[$btn] = [
            'btn' => 'btn btn-secondary',
            'time' => $type == 'hadir' || $type == 'keluar' ? $absensi : '--:--',
            'text' => $type == 'hadir' || $type == 'keluar' ? '--success-500' : '--text-secondary',
            'icon' => $type == 'hadir' || $type == 'keluar' ? '--success-500' : '--text-secondary',
        ];

        $props[$btn]['access'] = $type == 'keluar' ? '' : 'disabled';
        return $props;
    }
}
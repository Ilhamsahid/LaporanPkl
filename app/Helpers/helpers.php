<?php

if(!function_exists('getTableVars')){
    function getTableVars($view) {
        $view = str_replace('.', '/', $view);
        $tableVars = include resource_path('views/partials/' . $view . '.blade.php');
        return $tableVars;
    };
}

if(!function_exists('currentGuard')){
    function getCurrentGuard(){
        $guards = ['admin', 'pembimbing', 'siswa'];

        foreach($guards as $guard){
            if (Auth::guard($guard)->check()){
                return $guard;
            }
        }
        return null;
    }
}

if(!function_exists('redirectWithAuth')){
    function redirectWithAuth($view){
        $currentGuard = getCurrentGuard();

        if($currentGuard != null && Auth::guard($currentGuard)->check()){
            return redirect()->route( $currentGuard . '.dashboard');
        }

        return view($view);
    }
}

if(!function_exists('getGrade')){
    function getGrade($param){
        $props = [
            'span' => '',
            'grade' => '',
            'message' => '',
        ];
        if ($param > 90 && $param <= 100){
            $props['message'] = 'Sangat Baik';
            $props['span'] = 'success';
            $props['grade'] = 'A';
        }else if ($param > 80 && $param <= 90){
            $props['message'] = 'Cukup Baik';
            $props['span'] = 'warning';
            $props['grade'] = 'B';
        }else {
            $props['message'] = 'Baik';
            $props['span'] = 'danger';
            $props['grade'] = 'C';
        }

        return $props;
    }
}
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
        $guards = ['admin', 'pembimbing'];

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
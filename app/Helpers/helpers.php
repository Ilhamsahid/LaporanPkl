<?php

if(!function_exists('getTableVars')){
    function getTableVars($view) {
        $view = str_replace('.', '/', $view);
        $tableVars = include resource_path('views/partials/' . $view . '.blade.php');
        return $tableVars;
    };
}
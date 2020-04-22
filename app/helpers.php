<?php

function activeMenu($routeName = '') {
    $active = '';
    if (Request::routeIs($routeName)) {
        $active = 'active';
    }
    return $active;
}

function storedImage($path = ''){
    return asset('images') . '/' . $path;
}
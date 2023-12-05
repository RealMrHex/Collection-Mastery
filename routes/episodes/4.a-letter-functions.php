<?php

use Illuminate\Support\Facades\Route;

Route::get('7', static function ()
{
    $colors     = ['lime', 'violet', 'rose'];
    $collection = collect($colors);
    $all        = $collection->all();
    dd($colors, $collection, $all);
});

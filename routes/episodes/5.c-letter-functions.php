<?php

use Illuminate\Support\Facades\Route;

Route::get('9', static function ()
{
    $colors = collect(['red', 'green', 'blue', 'yellow', 'black', 'white', 'rose', 'amber']);
    $chunkedColors = $colors->chunk(4);

    dd($chunkedColors->all());
});


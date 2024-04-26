<?php

use Illuminate\Support\Facades\Route;

Route::get('21', static function ()
{
    $collection = collect(['armin', 'reza', 'ali', 'saeed']);

    // $collection->dd(); # == equals to == dd($collection->all());
    // dd($collection);

    $collection->dd();
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('3', static function ()
{
    $colors          = ['red', 'green', null, 'blue', null, 'black'];
    $collection      = collect($colors);
    $upperCollection = $collection->map(fn($item) => strtoupper($item));
    $cleanCollection = $upperCollection->reject(fn($item) => empty($item));
    $allInOne        = collect($colors)->map(fn($item) => strtoupper($item))->reject(fn($item) => empty($item));
    dd($colors, $collection, $upperCollection, $cleanCollection, $allInOne);
});

Route::get('4', static function ()
{
    $colorsCollection   = collect(['red', 'green', 'blue']);
    $studentsCollection = collect(['reza', 'ali', 'simin', 'maryam']);

    dd($colorsCollection, $studentsCollection);
});

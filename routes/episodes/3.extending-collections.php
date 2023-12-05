<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

Route::get('5', static function ()
{
    // todo: Add this in the service provider
    Collection::macro('toUpper', function ()
    {
        return $this->map(fn($item) => strtoupper($item));
    });

    $colors = ['red', 'green', 'blue'];

    $collection = collect($colors)->toUpper();

    dd($colors, $collection);
});

Route::get('6', static function ()
{
    Collection::macro('ucFirstPrefixed', function (string $prefix = '')
    {
        return $this->map(fn($item) => $prefix . ucfirst($item));
    });

    $students   = ['john', 'rose'];
    $collection = collect($students)->ucFirstPrefixed('#------');
    dd($students, $collection);
});

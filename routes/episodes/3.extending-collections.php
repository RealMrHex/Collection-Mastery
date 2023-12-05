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

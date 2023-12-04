<?php

use Illuminate\Support\Facades\Route;

Route::get('1', static function ()
{
    return 'Episode 1, Session 1: Silence is golden';
});

Route::get('2', static function ()
{
    return 'Episode 1, Session 2: Silence is golden';
});

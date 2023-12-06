<?php

use Illuminate\Support\Facades\Route;

Route::get('7', static function ()
{
    $colors     = ['lime', 'violet', 'rose'];
    $collection = collect($colors);
    $all        = $collection->all();
    dd($colors, $collection, $all);
});

Route::get('8', static function ()
{
    $points    = [18, 16, 20, 19];
    $pointsAvg = collect($points)->average();
    #$pointsAvg = collect($points)->avg(); // note: avg alias

    $students = [
        [
            'name'  => 'John',
            'point' => 19,
        ],
        [
            'name'  => 'Sarah',
            'point' => 20,
        ],
        [
            'name'  => 'Rose',
            'point' => 15,
        ],
    ];
    $studentsAvg = collect($students)->average('point');
    #$studentsAvg = collect($students)->avg('point');  // note: avg alias

    dd($points, $pointsAvg, $students, $studentsAvg);
});

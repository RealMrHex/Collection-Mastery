<?php

use Illuminate\Support\Facades\Route;

Route::get('21', static function ()
{
    $collection = collect(['armin', 'reza', 'ali', 'saeed']);

    // $collection->dd(); # == equals to == dd($collection->all());
    // dd($collection);

    $collection->dd();
});

Route::get('22', static function ()
{
    $numbers = collect([1, 2, 3, 4, 5, 6]);
    $result  = $numbers->diff([2, 4, 6]);

    $data = collect(
        [
            'armin' => 'Apple',
            'negar' => 'Orange',
            'sevda' => 'Pineapple'
        ]
    );

    $dataResult = $data->diff(
        [
            'pineapple',
            'Apple',
            'Orange',
        ]
    );

    dd($result->all(), $dataResult->all());
});

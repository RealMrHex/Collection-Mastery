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
            'sevda' => 'Pineapple',
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

Route::get('23', static function ()
{
    $data = collect(
        [
            'type'    => 'fruit',
            'model'   => 'apple',
            'country' => 'united states',
            'year'    => 2023,
        ]
    );

    $result = $data->diffAssoc(
        [
            'type'         => 'Mobile',
            'model'        => 'Apple',
            'country'      => 'united states',
            'year'         => '2023',
            'is_refreshed' => true,
        ]
    );

    dd($result);
});

Route::get('24', static function ()
{
    $collection = collect(
        [
            'type'  => 'fruit',
            'color' => 'red',
            'model' => 'apple',
        ]
    );


    $output = $collection->diffAssocUsing(
        [
            'Type'  => 'fruit',
            'color' => 'red',
            'model' => 'apple',
        ],
        'strnatcmp'
    );

    dd($output->all());
});

Route::get('25', static function ()
{
    $collection = collect(
        [
            'key-1' => 'one',
            'key-2' => 'two',
            'key-3' => 'three',
            'key-4' => 'four',
        ]
    );

    $output = $collection->diffKeys(
        [
            'key-4' => 'new-four',
            'key-5' => 'five',
        ]
    );

    dd($output);
});

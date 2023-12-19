<?php

use Illuminate\Support\Facades\Route;

Route::get('9', static function ()
{
    $colors        = collect(['red', 'green', 'blue', 'yellow', 'black', 'white', 'rose', 'amber']);
    $chunkedColors = $colors->chunk(4);

    dd($chunkedColors->all());
});

Route::get('10', static function ()
{
    $lettersArray   = str_split('AABBBCCCCDDDDDE');
    $letters        = collect($lettersArray);
    $chunkedLetters = $letters->chunkWhile(
        function ($currentValue, $currentIndex, $previousChunk)
        {
            return ($currentValue === $previousChunk->last());
        }
    );

    $names        = collect(['Ali', 'Reza', 'Mohammad', 'And', 'Saeed', 'Qolam', 'And', 'Niaz']);
    $chunkedNames = $names->chunkWhile(
        function ($currentValue)
        {
            return ($currentValue !== 'And');
        }
    );

    dd($lettersArray, $letters, $chunkedLetters->all(), $chunkedNames);
});

Route::get('11', static function ()
{
    $flightMembers = collect(
        [
            ['Negar', 'Sogand', 'Reza'],
            ['Armin', 'Ali', 'Mona'],
            ['Saeed', 'Kimia', 'Kia'],
        ]
    );

    $flattenFlightMembers = $flightMembers->collapse();

    dd($flightMembers, $flattenFlightMembers);
});

Route::get('12', static function ()
{
    $colors           = ['red', 'green', 'blue'];
    $colorsCollection = collect($colors);
    $newCollection    = $colorsCollection->collect();

    dd($colors, $colorsCollection, $newCollection);
});



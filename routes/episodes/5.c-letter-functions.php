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

Route::get('13', static function ()
{
    $person     = collect(['first_name', 'last_name', 'city', 'age']);
    $realPerson = $person->combine(['Negar', 'Jf.', 'N.Y', '21']);
    dd($person->all(), $realPerson->all(), $realPerson);
});

Route::get('14', static function ()
{
    $students    = collect(['Negar']);
    $newStudents = $students
        ->concat(['Armin', 'Reza'])
        ->concat(['first_name' => 'Kimia'])
        ->concat(['Alireza', 'name' => 'Amir'])
    ;

    dd($students, $newStudents);
});

Route::get('15', static function ()
{
    $numbers       = collect([1, 2, 3, 4, 5]);
    $isTwoExists   = $numbers->contains(2); // true
    $isSevenExists = $numbers->contains(7); // false
    $result        = $numbers->contains(
        function ($value, $index)
        {
            return $value > 5;
            #dd($value, $index); // value: 1, index: 0
        }
    );
    #dd($isTwoExists, $isSevenExists, $result); // true, false, false

    $products = collect(
        [
            ['product' => 'Laptop', 'model' => 'Lenovo', 'price' => 1700, 'currency' => 'Euro'],
            ['product' => 'Mobile', 'model' => 'Apple', 'price' => 1000, 'currency' => 'Euro'],
        ]
    );

    $isLaptopExists  = $products->contains('product', 'Laptop');  // true
    $isLenovoExists  = $products->contains('model', 'Lenovo');    // true
    $isMacBookExists = $products->contains('product', 'MacBook'); // false

    #dd($isLaptopExists, $isLenovoExists, $isMacBookExists);

    $flight     = collect(['from' => 'new-york', 'to' => 'iran', 'price' => 1950, 'currency' => 'dollar']);
    $isNYExists = $flight->contains('new-york');    // true
    $isLAExists = $flight->contains('los-angeles'); // false

    dd($isNYExists, $isLAExists);
});

Route::get('16', static function ()
{
    $colors  = collect(['red', 'green', 'blue']); // items: 3
    $fruits  = collect(['apple']);                // items: 1
    $nothing = collect([]);                       // items: 0

    dd(
        $colors->containsOneItem(), // false
        $fruits->containsOneItem(), // true
        $nothing->containsOneItem() // false
    );
});

Route::get('17', static function ()
{
    $numbers = collect([1, 2, '3', '4']);

    dd(
        $numbers->contains('2'), // true
        $numbers->contains(3), // true
        $numbers->containsStrict('2'), // false
        $numbers->containsStrict(3), // false
        //==================================
        $numbers->containsStrict(2), // true
        $numbers->containsStrict('3'), // true
    );

    // ==  loose comparison
    // 2 (int) == '2' (string) => true > loose

    // === strict comparison
    // 2 (int) === '2' (string) => false > strict
    // 2 (int) === 2 (int) => true > strict
});

Route::get('18', static function ()
{
    $colors = collect(['red', 'amber', 'yellow', 'white']); // items: 4
    $empty = collect(); // items: 0

    dd(
        $colors->count(),
        $empty->count()
    );
});

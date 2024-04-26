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

Route::get('26', static function ()
{
    $numbers = collect([1, 2, 3, 4, 5, 6, 10]);
    $output  = $numbers->doesntContain(
        static function ($value, $index)
        {
            return $value > 6;
        }
    );

    /*dd(
        $output
        ? 'does not contain any value greater than 6'
        : 'does contain any value greater than 6'
    );*/

    $names  = collect(['armin', 'negar', 'sevda']);
    $output = $names->doesntContain('saeed');
    // dd($output);

    $cart   = collect(
        [
            'item'  => 'Watch',
            'model' => 'Apple Watch 7th Series',
            'price' => '2000$',
            'qty'   => '1',
        ]
    );
    $output = $cart->doesntContain('Watch');
    // dd($output);

    $products = collect(
        [
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
        ]
    );
    $output   = $products->doesntContain('product', 'Table');
    dd($output);
});

Route::get('27', static function ()
{
    $data = collect(
        [
            'products'         => [
                'desk'  => ['price' => '120$', 'qty' => 1],
                'chair' => ['price' => '140$', 'qty' => 2],
                'watch' => ['price' => '150$', 'qty' => 3],
            ],
            'shipping_methods' => [
                'uber'   => ['price' => '50$', 'est_time' => '2h'],
                'yandex' => ['price' => '10$', 'est_time' => '3d'],
            ],
        ]
    );

    $output = $data->dot();

    dd($output);
});

Route::get('28', static function ()
{
    $collection = collect(['armin', 'developer', 'laravel']);

    $collection->dump();

    echo '<hr>';

    echo 'dump succeeded.';
});

Route::get('29', static function ()
{
    $numbers    = collect([1, 1, 1, 2, 3, 3, 4, 5, 5, 5, 5, 6]);
    $duplicates = $numbers->duplicates();
    // dd($duplicates);

    $users              = collect(
        [
            ['mobile' => '+989121001010', 'username' => 'mentionhex'],
            ['mobile' => '+989121001011', 'username' => 'mentionhex'],
            ['mobile' => '+989121001010', 'username' => 'mentionhex2'],
            ['mobile' => '+989121001013', 'username' => 'mentionhex'],
            ['mobile' => '+989121001010', 'username' => 'mentionhex4'],
        ]
    );
    $mobileDuplicates   = $users->duplicates('mobile');
    $usernameDuplicates = $users->duplicates('username');
    dd($mobileDuplicates, $usernameDuplicates);
});

Route::get('30', static function ()
{
    $numbers = collect(['1', '1', 1, 1]);
    $duplicates = $numbers->duplicatesStrict();
    dd($duplicates);
});

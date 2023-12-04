<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

Route::prefix('session')->group(
    static function ()
    {
        $episodeFiles = File::files(base_path('routes/episodes'));
        collect($episodeFiles)->each(fn(SplFileInfo $file) => include $file->getPathname());
    }
);

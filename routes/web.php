<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'lang'], function () {
    Route::get('/', function () {
        $lang = session()->get('lang') ?? 'en';
        $path = "storage/json/" . $lang . ".json"; // ie: /var/www/laravel/app/storage/json/filename.json
        if (!File::exists($path)) {
            throw new Exception("Invalid Data File");
        }
        $data = json_decode(File::get($path), true); // string
        return view('templates.default.home', compact('data', 'lang'));
    });

    Route::get('/page/{slug}', function ($slug) {
        $lang = session()->get('lang') ?? 'en';
        $path = "storage/json/" . $lang . ".json"; // ie: /var/www/laravel/app/storage/json/filename.json
        if (!File::exists($path)) {
            throw new Exception("Invalid Data File");
        }
        $data = json_decode(File::get($path), true); // string
        if (!array_key_exists($slug, $data['pages'])) {
            abort(404);
        }
        return view('templates.default.page', compact('data', 'lang', 'slug'));
    });

    Route::get('/contact', function () {
        $lang = session()->get('lang') ?? 'en';
        $path = "storage/json/" . $lang . ".json"; // ie: /var/www/laravel/app/storage/json/filename.json
        if (!File::exists($path)) {
            throw new Exception("Invalid Data File");
        }
        $data = json_decode(File::get($path), true); // string

        return view('templates.default.contact', compact('data', 'lang'));
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Firmware;

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

Route::get('/', function () {
    return "Firmware";
});

Route::get('/{repo}/latest', function (string $repo) {
    return Firmware::where('repo', $repo)
        ->orderByDesc('version')
        ->limit(1)
        ->get()
        ->first()->version;
});

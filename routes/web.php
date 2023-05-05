<?php

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

/**
 * Routes used in vue router
 * @var array $aRoutes
 */
$aRoutes = [
    'app'       => '',
    'app.index' => '/app'
];

foreach ($aRoutes as $sRouteName => $sVueRoute) {
    Route::get($sVueRoute, function() {
        return view('app');
    })->name($sRouteName);
}
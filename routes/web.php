<?php

use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bejelentkezes', function () {
    return view('login');
});

Route::get('/regisztracio', function () {
    return view('register');
});

// Route::controller(Product::class)->group(function(){
//     Route::get('/termekek/{product}', 'show');
// });
Route::get('/termekek/{product}',[App\Http\Controllers\ProductController::class, 'show']);


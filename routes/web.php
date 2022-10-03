<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\moviesDetails;
use App\Http\Controllers\seriesDetails;
use App\Http\Controllers\series;
use App\Http\Controllers\movies;
use App\Http\Controllers\latest;
use App\Http\Controllers\search;
use App\Http\Controllers\category;

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

/* Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
}); */

// test route
Route::get('/test/{id}', [search::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/', [home::class, 'index']);
Route::get('/home', [home::class, 'index']);
Route::get('/movies/{id}', [moviesDetails::class, 'index']);
Route::get('/series', [series::class, 'index']);
// Route::get('/series', [series::class, 'index'])->name('series');
Route::get('/series/{id}', [seriesDetails::class, 'index']);
Route::get('/series/download/{id}', [seriesDetails::class, 'download']);
Route::get('/movies', [movies::class, 'index']);
Route::get('search/{id}', [search::class, 'index']);
Route::get('/results/{id}', [search::class, 'index']);
Route::get('/movies/category/{id}', [category::class, 'index']);
Route::get('/series/category/{id}', [category::class, 'series']);
/* Route::get('/series', function () {
    return view('series');
}); */
Route::get('/latest', [latest::class, 'index']);
// disclaimer
Route::get('/disclaimer', function () {
    return view('disclaimer');
});
// terms and conditions
Route::get('/terms', function () {
    return view('terms');
});
// moviesIndex
Route::get('/moviesIndex', [movies::class, 'indexmovies']);
// seriesIndex
Route::get('/seriesIndex', [series::class, 'indexseries']);
// contact
Route::get('/contact', function () {
    return view('contact');
});
// about
Route::get('/about', function () {
    return view('about');
});


// login pages
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/ret', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/homep', function () {
        return view('premium/home');
    })->name('home');
    Route::get('/moviesp', function () {
        return view('premium/movies');
    })->name('movies');
    Route::get('/seriesp', function () {
        return view('premium/series');
    })->name('series');
    Route::get('/latestp', function () {
        return view('premium/latest');
    })->name('latest');
});

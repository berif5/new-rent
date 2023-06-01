<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ProductController;

use App\Http\Controllers\LessorController;
use App\Http\Controllers\PropertyController;


use App\Http\Controllers\Auth\RegiestrationController;

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
    return view('welcome');
});




// Home Page
Route::get('/index', function () {
    return view('index');
})->name('home');


// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services Page
Route::get('/services', function () {
    return view('services');
})->name('services');

// Vehicles Page
// Route::get('/vehicle', function () {
//     return view('vehicle');
// })->name('vehicle');
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

// Client Page
Route::get('/client', function () {
    return view('client');
})->name('client');

// Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// lessor Page
// Route::get('/lessor', function () {
//     return view('lessor.index');
// })->name('lessor.index');


// Route::get('/lessor', 'LessorController@index')->name('lessor.index');
Route::get('/lessor', [LessorController::class, 'index'])->name('lessor.index');

Route::put('/lessors/{lessor}', [LessorController::class, 'update'])->name('lessor.update');

Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property', [PropertyController::class, 'store'])->name('property.store');





Route::get('sign', function () {
    return view('sign_user');
});

Route::post('sign', [RegiestrationController::class , 'sign_action']);


Route::get('sign_lessor', function () {
    return view('sign_lessor');
});

Route::post('/sign-lessor', [RegiestrationController::class, 'sign_lessor'])->name('sign_lessor');

Route::get('/vehicle', [ProductController::class, 'index'])->name('vehicle');

Route::get('/singleproduct/{id}', [ProductController::class, 'show'])->name('singleproduct');


Route::post('/submit-rating', 'ProductController@submitRating');
Route::post('/get-ratings', 'ProductController@getRatings');

Route::get('login', function () {
    return view('login');
});

Route::post('/login', [RegiestrationController::class, 'login'])->name('login');

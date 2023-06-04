<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\LessorDashboardController;
use App\Http\Controllers\ProductDashboardController;
use App\Http\Controllers\ReviewdashboardController;
use App\Http\Controllers\BookingdashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessorController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;



use App\Http\Controllers\AppProfileController;

use App\Http\Controllers\Auth\RegistrationController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

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
    return view('index');
});




Route::get('/', [HomeController::class, 'index'])->name('home');




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

Route::get('/payment1', function () {
    return view('payment1');
})->name('payment1');


Route::get('/index', function () {
    return view('index');
})->name('index');

// lessor Page
// Route::get('/lessor', function () {
//     return view('lessor.index');
// })->name('lessor.index');


// Route::get('/lessor', 'LessorController@index')->name('lessor.index');
// Route::get('/', 'HomeController@index')->name('index');



Route::get('/lessor', [LessorController::class, 'index'])->name('lessor.index');

Route::put('/lessors/{lessor}', [LessorController::class, 'update'])->name('lessor.update');



// Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');

Route::group(['middleware' => 'user'], function () {

    Route::get('/bookingdashboard', [BookingdashboardController::class, 'index'])->name('bookingdashboard.index');
    Route::get('/bookingtdashboard/{id}', [BookingdashboardController::class, 'show'])->name('bookingdashboard.show');


});

Route::get('sign', function () {
    return view('sign_user');
});

Route::post('sign', [RegistrationController::class , 'sign_action'])->name('sign');


Route::get('sign_lessor', function () {
    return view('sign_lessor');
});

Route::post('sign_lessor', [RegistrationController::class , 'sign_lessor']);


Route::group(['middleware' => 'lessor'], function () {
    // Lessor routes here
    Route::get('/lessordashboard', [LessorDashboardController::class, 'index'])->name('lessordashboard.index');
Route::get('/lessordashboard/{id}', [LessorDashboardController::class, 'show'])->name('lessordashboard.show');
Route::get('/lessordashboard/{id}/edit', [LessorDashboardController::class, 'edit'])->name('lessordashboard.edit');
Route::put('/lessordashboard/{id}', [LessorDashboardController::class, 'update'])->name('lessordashboard.update');
Route::delete('/lessordashboard/{id}', [LessorDashboardController::class, 'destroy'])->name('lessordashboard.destroy');

});

Route::group(['middleware' => 'admin'], function () {
    // Admin routes here
    Route::resource('/admin/layout1', AdminController::class)->names([
        'index' => 'admin.layout1.index'
    ]);
});

Route::get('/vehicle', [ProductController::class, 'index'])->name('vehicle');

Route::get('/index', [ProductController::class, 'index'])->name('index');


Route::get('/singleproduct/{id}', [ProductController::class, 'show'])->name('singleproduct');


Route::post('/submit-rating', 'ProductController@submitRating');
Route::post('/get-ratings', 'ProductController@getRatings');


Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard.index');
Route::get('/userdashboard/{id}', [UserDashboardController::class, 'show'])->name('userdashboard.show');
Route::get('/userdashboard/{id}/edit', [UserDashboardController::class, 'edit'])->name('userdashboard.edit');
Route::put('/userdashboard/{id}', [UserDashboardController::class, 'update'])->name('userdashboard.update');
Route::delete('/userdashboard/{id}', [UserDashboardController::class, 'destroy'])->name('userdashboard.destroy');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.layout1.index');

Route::get('/productdashboard', [ProductDashboardController::class, 'index'])->name('productdashboard.index');
Route::get('/productdashboard/{id}', [ProductDashboardController::class, 'show'])->name('productdashboard.show');
Route::get('/productdashboard/{id}/edit', [ProductDashboardController::class, 'edit'])->name('productdashboard.edit');
Route::put('/productdashboard/{id}', [ProductDashboardController::class, 'update'])->name('productdashboard.update');
Route::delete('/productdashboard/{id}', [ProductDashboardController::class, 'destroy'])->name('productdashboard.destroy');
 Route::get('/app-profile', [AdminController::class, 'showProfile'])->name('app-profile');

 Route::get('/reviewdashboard', [ReviewdashboardController::class, 'index'])->name('reviewdashboard.index');
 Route::get('/reviewdashboard/{id}', [ReviewdashboardController::class, 'show'])->name('reviewdashboard.show');
 Route::delete('/reviewdashboard/{id}', [ReviewdashboardController::class, 'destroy'])->name('reviewdashboard.destroy');

//  Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/user/{id}', [UserController::class, 'show'])->name('user.profile');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');



// Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');

Route::get('login', function () {
    return view('login');
});

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


// Route::post('/booking', 'BookingController@store')->name('booking.store');

// Route::get('/booking/success', function () {
//     return view('booking.success');
// })->name('booking.success');


//
Route::post('/login', [RegistrationController::class, 'login'])->name('login');
 Route::get('/bookingdashboard', [BookingdashboardController::class, 'index'])->name('bookingdashboard.index');
 Route::get('/bookingtdashboard/{id}', [BookingdashboardController::class, 'show'])->name('bookingdashboard.show');


 Route::post('/search', [SearchController::class, 'search'])->name('search');

//  Route::get('/payment/{booking_id}', [PaymentController::class, 'showPayment'])->name('payment');


// Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
// Route::get('/payment/success', function () {
//     return "Payment Successful!";
// })->name('payment.success');

// Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');



 Route::get('/property/{id}/edit', [PropertyController::class, 'edit'])->name('property.edit');
 Route::delete('/property/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

 Route::put('/property/{id}/update', [PropertyController::class, 'update'])->name('property.update');
 Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property', [PropertyController::class, 'store'])->name('property.store');




// productedashboard
Route::get('/productdashboard', [ProductDashboardController::class, 'index'])->name('productdashboard.index');
Route::get('/productdashboard/{id}', [ProductDashboardController::class, 'show'])->name('productdashboard.show');
Route::get('/admin/productdashboard/create', [ProductDashboardController::class, 'create'])->name('productdashboard.create');
Route::post('/productdashboard', [ProductDashboardController::class, 'store'])->name('productdashboard.store');
Route::get('/productdashboard/{id}/edit', [ProductDashboardController::class, 'edit'])->name('productdashboard.edit');
Route::put('/productdashboard/{id}', [ProductDashboardController::class, 'update'])->name('productdashboard.update');
Route::delete('/productdashboard/{id}', [ProductDashboardController::class, 'destroy'])->name('productdashboard.destroy');
Route::get('/admin/productdashboard', [ProductDashboardController::class, 'index'])->name('admin.productdashboard.index');

//  Route::get('admin.bookingdashboard.index', function () {
//     return view('admin.bookingdashboard.index'); payment
// });

Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');

 Route::Get('/search', [SearchController::class, 'search'])->name('search');



 Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

 Route::post('/logout', [RegistrationController::class, 'logout']);
 Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
//  Route::get('/singleproduct/{id}', [ProductController::class, 'show']);


Route::get('/map', function () {
    return view('map');
});
 Route::get('/users', [UserDashboardController::class, 'index'])->name('userdashboard.index');

 Route::get('/users', [UserDashboardController::class, 'index'])->name('userdashboard.index');// pagination userdashboard
 Route::get('/lessors', [LessorDashboardController::class, 'index'])->name('lessordashboard.index');//pagination lessordashboard
 Route::get('/bookings', [BookingdashboardController::class, 'index'])->name('bookingdashboard.index');//pagination booking
 Route::get('/products', [ProductDashboardController::class, 'index'])->name('productdashboard.index');//pagination product
 Route::get('/reviews', [ReviewdashboardController::class, 'index'])->name('reviewdashboard.index');//pagination review
 Route::get('/appProfile', [AppProfileController::class, 'index'])->name('appProfile');
//  Route::get('/products', [ProductDashboardController::class, 'showProducts']);//admin function
 Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
//  Route::get('/edit-profile', [AppProfileController::class, 'edit'])->name('edit-profile');
 Route::post('/profile/update',  [AppProfileController::class, 'update'])->name('update-profile');


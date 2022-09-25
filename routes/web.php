<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

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
})->name('welcome');

// Route::get('/checkout/{slug?}', function () {
//     return view('checkout');
// })->name('checkout');


Route::group(['middleware'=>'auth'], function(){ //yang berada didalam group ini hanya untuk yang sudah login
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/{slug?}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/storecheckout/{id?}', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/success_checkout', function () {
        return view('success_checkout');
    })->name('success_checkout');
});

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware(['auth'])->name('dashboard');

//sociallite routes
Route::get('/sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('/auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.login.callback');
//end sociallite routes

require __DIR__.'/auth.php';

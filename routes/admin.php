<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\RateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
Route::get('storage-link', function () {
    Artisan::call('storage:link');
});
Route::get('migratfresh', function () {
    Artisan::call('mi:f --seed ');
});
Route::group(['middleware'=>['auth','support','language']],function (){

    Route::post('user-book', [BookController::class,'userbooks'])->name('userbooks.store');
    Route::resource('books', BookController::class);
    Route::post('books-active', [BookController::class,'changeStatus']);
    Route::post('book-status/{id}', [BookController::class,'adminChangeStatus']);
    Route::resource('offers', OfferController::class);
    Route::post('offers-active', [OfferController::class,'changeStatus']);
    Route::post('customers', [UserController::class,'store'])->name('customers.store');

    Route::get('users', [UserController::class,'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class,'show'])->name('users.show');
    Route::post('users', [UserController::class,'store'])->name('users.store');
    Route::put('users/{user}', [UserController::class,'update'])->name('users.update');
    Route::post('users-active', [UserController::class,'changeStatus']);

    Route::post('category-assign', [UserController::class,'changeCategory']);
});

Route::group(['middleware'=>['auth','admition','language']],function (){
    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::get('/offer-reports', [ReportController::class, 'offer'])->name('reports.offer');
    Route::get('/income-reports', [ReportController::class, 'income'])->name('reports.income');
    Route::get('/best-offers-reports', [ReportController::class, 'bestOffers'])->name('reports.bestOffers');
    Route::get('/best-customers-reports', [ReportController::class, 'bestCustomers'])->name('reports.bestCustomers');

    Route::post('partners-active', [PartnerController::class,'changeStatus']);
    Route::resource('partners', PartnerController::class);

    Route::delete('users/{id}', [UserController::class,'destroy'])->name('users.destroy');

    Route::resource('contacts', ContactController::class);
    Route::post('contacts-active', [ContactController::class,'changeStatus']);

    Route::resource('countries', CountriesController::class);
    Route::post('countries-active', [CountriesController::class,'changeStatus']);

    Route::resource('cities', CitiesController::class);
    Route::post('cities-active', [CitiesController::class,'changeStatus']);

    Route::resource('sliders', SliderController::class);
    Route::post('sliders-active', [SliderController::class,'changeStatus']);
    Route::resource('services', ServiceController::class);
    Route::post('services-active', [ServiceController::class,'changeStatus']);



    Route::resource('rates', RateController::class);
    Route::post('rates-active', [RateController::class,'changeStatus']);


    Route::resource('info', InfoController::class);

    Route::resource('notifications', NotificationsController::class);



});




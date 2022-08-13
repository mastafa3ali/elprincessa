<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Website\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', [HomeController::class,'select'])->name('select');
Route::get('/',[FrontController::class,'index'])->name('/');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/policy',[FrontController::class,'policy'])->name('policy');
Route::get('/all-offers',[FrontController::class,'offers'])->name('site.offers');
Route::get('/our-services',[FrontController::class,'ourservices'])->name('ourservices');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::post('/contactus',[FrontController::class,'saveContact'])->name('contactus');
Route::get('/offer-details/{id}',[FrontController::class,'offerDetails'])->name('offer.details');
Route::group(['middleware'=>['auth']],function (){

Route::get('/myprofile',[FrontController::class,'profile'])->name('site.profile');
Route::get('/myservice',[FrontController::class,'myservice'])->name('myservice');
});
require __DIR__.'/auth.php';





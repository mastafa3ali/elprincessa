<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\LookUp\CityController;
use App\Http\Controllers\Api\LookUp\SliderController;
use App\Http\Controllers\Api\LookUp\CountryController;
use App\Http\Controllers\Api\LookUp\PartnerController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Api\LookUp\OfferController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api','lang'],'namespace' => 'Api'], function () {

    Route::group(['prefix'=>'auth'], function () {
        Route::post('login', [AuthController::class,'login']);
        Route::post('register', [AuthController::class,'register']);
        Route::post('forgot', [AuthController::class,'forgotEmail']);
        Route::post('checkcode', [AuthController::class,'checkcode']);
        Route::post('reset', [AuthController::class,'reset']);
    });

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('profileImage/{user}', [AuthController::class,'profileImage']);
        Route::get('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::get('me', [AuthController::class,'me']);
        Route::get('user', [AuthController::class,'user']);
        Route::post('profile', [AuthController::class,'profile']);
        Route::put('changePassword', [AuthController::class,'changePassword']);

        Route::group(['prefix' => 'rate'], function () {
            Route::get('/', [RateController::class, 'index']);
            Route::get('/user-rate/{id}', [RateController::class, 'userRate']);
            Route::get('/user-rate-count/{id}', [RateController::class, 'userRateCount']);
            Route::post('/', [RateController::class, 'store']);
            Route::get('{rate}', [RateController::class, 'get']);
            Route::put('{rate}', [RateController::class, 'update']);
            Route::delete('bulkDelete', [RateController::class, 'bulkDelete']);
            Route::post('bulkRestore', [RateController::class, 'bulkRestore']);
        });

        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::post('book', [OfferController::class,'book']);
        Route::get('userbooks', [OfferController::class,'userbooks']);
        Route::get('cancelBook/{id}', [OfferController::class,'cancelBook']);
        Route::get('mybooks', [OfferController::class,'mybooks']);
    });

    Route::get('info', [InfoController::class,'index']);
    Route::post('search', [OfferController::class,'search']);
    Route::get('offers', [OfferController::class,'index']);
    Route::get('offer-details/{id}', [OfferController::class,'show']);
    Route::post('contacts', [ContactController::class,'store']);

    Route::group(['middleware' => [], 'namespace' => 'LookUp'], function () {
        Route::group([ 'prefix' => 'country'], function () {
            Route::get('/', [CountryController::class,'index']);
        });
        Route::group([ 'prefix' => 'slider'], function () {
            Route::get('/', [SliderController::class,'index']);
        });
        Route::group([ 'prefix' => 'cities'], function () {
            Route::get('/', [CityController::class,'index']);
        });
        Route::group([ 'prefix' => 'partners'], function () {
            Route::get('/', [PartnerController::class,'index']);
        });
    });
    Route::post('backfunct', [BookController::class,'backfunct']);

});


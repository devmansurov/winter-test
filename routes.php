<?php

use Illuminate\Support\Facades\Route;
use Pp\Kistochki\Classes\Api\Controllers\Promotions;
use Pp\Kistochki\Controllers\Callbacks;
use Pp\Kistochki\Classes\Api\Controllers\Districts;
use Pp\Kistochki\Classes\Api\Controllers\Saloons;
use Pp\Kistochki\Classes\Api\Controllers\Services;
use Pp\Kistochki\Classes\Api\Controllers\Reviews;
use Pp\Kistochki\Classes\Api\Controllers\Images;
use Pp\Kistochki\Classes\Api\Controllers\Newses;
use Pp\Kistochki\Classes\Api\Controllers\Portfolios;
use Pp\Kistochki\Classes\Api\Controllers\Cities;
use Pp\Kistochki\Classes\Api\Controllers\Hits;
use Pp\Kistochki\Classes\Api\Controllers\Goals;
use Pp\Kistochki\Classes\Api\Controllers\Menus;
use Pp\Kistochki\Controllers\Settings;
use Pp\Kistochki\Classes\Api\Controllers\Infos;

// pp/kistochki/api
Route::prefix('api')->group(function () {
  Route::get('cities', [Cities::class, 'all']);
  Route::get('districts', [Districts::class, 'lines']);
  Route::get('districts/{item}', [Districts::class, 'line']);
  Route::get('districts/{item}/stations', [Districts::class, 'lineStations']);
  Route::get('district/stations', [Districts::class, 'stations']);
  Route::get('district/stations/{item}', [Districts::class, 'station']);
  Route::get('saloons', [Saloons::class, 'all']);
  Route::get('saloons/{item}', [Saloons::class, 'item']);
  Route::get('services', [Services::class, 'all']);
  Route::get('services/{item}', [Services::class, 'item']);
  Route::get('service/categories', [Services::class, 'categories']);
  Route::get('service/categories/{item}', [Services::class, 'category']);
  Route::get('hits', [Hits::class, 'all']);
  Route::get('hits/{item}', [Hits::class, 'item']);
  Route::get('reviews', [Reviews::class, 'all']);
  Route::get('promotions', [Promotions::class, 'all']);
  Route::get('promotions/{item}', [Promotions::class, 'item']);
  Route::get('thumb', [Images::class, 'crop']);
  Route::get('portfolios', [Portfolios::class, 'all']);
  Route::get('news', [Newses::class, 'all']);
  Route::get('news/{item}', [Newses::class, 'item']);
  Route::get('menus', [Menus::class, 'all']);
  Route::get('menus/{item}', [Menus::class, 'item']);
  Route::get('goals', [Goals::class, 'all']);
  Route::get('goals/{item}', [Goals::class, 'item']);
  Route::post('callback', [Callbacks::class, 'store']);
  Route::post('settings/set/{key}', [Settings::class, 'set'])->middleware('web');
  Route::get('info', [Infos::class, 'all']);
  Route::get('info/{item}', [Infos::class, 'item']);
});

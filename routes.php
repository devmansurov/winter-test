<?php

use Illuminate\Support\Facades\Route;
use Pp\Kistochki\Classes\Api\Controllers\Districts;
use Pp\Kistochki\Classes\Api\Controllers\Saloons;
use Pp\Kistochki\Classes\Api\Controllers\Services;
use Pp\Kistochki\Classes\Api\Controllers\Reviews;
use Pp\Kistochki\Classes\Api\Controllers\Images;
use Pp\Kistochki\Classes\Api\Controllers\Posts;
use Pp\Kistochki\Classes\Api\Controllers\Promotions;
use Pp\Kistochki\Classes\Api\Controllers\Portfolios;
use Pp\Kistochki\Classes\Api\Controllers\Newses;
use Pp\Kistochki\Classes\Api\Controllers\Hits;

// pp/kistochki/api
Route::prefix('api')->group(function () {
  Route::get('districts', [Districts::class, 'all']);
  Route::get('saloons', [Saloons::class, 'all']);
  Route::get('services', [Services::class, 'all']);
  Route::get('hits', [Hits::class, 'all']);
  Route::get('hits/{item}', [Hits::class, 'item']);
  Route::get('reviews', [Reviews::class, 'all']);
  Route::get('jobs', [Posts::class, 'jobs']);
  Route::get('promotions', [Promotions::class, 'all']);
//  Route::get('promotions/{item}', [Posts::class, 'item']); // Todo
  Route::get('loyalties', [Posts::class, 'loyalties']);
  Route::get('abonements', [Posts::class, 'abonements']);
  Route::get('certificates', [Posts::class, 'certificates']);
  Route::get('qualities', [Posts::class, 'qualities']);
  Route::get('thumb', [Images::class, 'crop']);
  Route::get('portfolios', [Portfolios::class, 'all']);
  Route::get('news', [Newses::class, 'all']);
  Route::get('news/{item}', [Newses::class, 'item']);
});

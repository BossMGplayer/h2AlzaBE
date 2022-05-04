<?php

use Marek\AlzaBE\Controllers\Extensions;
use Marek\AlzaBE\Controllers\Languages;
use Marek\AlzaBE\Controllers\People;
use Marek\AlzaBE\Controllers\PostPeople;
use Marek\AlzaBE\Controllers\Professions;
use Marek\AlzaBE\Controllers\Skills;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('Extensions', Extensions::class);
    Route::apiResource('Languages', Languages::class);
    Route::apiResource('People', People::class);
    Route::apiResource('PostPeople', PostPeople::class);
    Route::apiResource('Professions', Professions::class);
    Route::apiResource('Skills', Skills::class);
});

<?php

use Marek\Alza\Controllers\Extensions;
use Marek\Alza\Controllers\Languages;
use Marek\Alza\Controllers\People;
use Marek\Alza\Controllers\Proffesions;
use Marek\Alza\Controllers\Skills;
use Marek\Alza\Controllers\PersonPosts;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('Extensions', Extensions::class);
    Route::apiResource('Languages', Languages::class);
    Route::apiResource('People', People::class);
    Route::apiResource('Proffesions', Proffesions::class);
    Route::apiResource('Skills', Skills::class);
    Route::apiResource('PersonPosts', PersonPosts::class);
});

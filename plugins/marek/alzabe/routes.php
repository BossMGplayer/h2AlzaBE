<?php

use Marek\AlzaBE\Controllers\Extensions;
use Marek\AlzaBE\Controllers\ExtensionSkills;
use Marek\AlzaBE\Controllers\Languages;
use Marek\AlzaBE\Controllers\LanguageSkills;
use Marek\AlzaBE\Controllers\People;
use Marek\AlzaBE\Controllers\PostPeople;
use Marek\AlzaBE\Controllers\Professions;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('extensions', Extensions::class);
    Route::apiResource('languages', Languages::class);
    Route::apiResource('people', People::class);
    Route::apiResource('postpeople', PostPeople::class);
    Route::apiResource('professions', Professions::class);
    Route::apiResource('extensionskills', ExtensionSkills::class);
    Route::apiResource('languageskills', LanguageSkills::class);
});

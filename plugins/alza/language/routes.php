<?php
use Illuminate\Support\Facades\Route;
use Alza\Language\Controllers\LanguagesController;
use Alza\Language\Controllers\LanguageSkillsController;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('languages', LanguagesController::class);
    Route::apiResource('languageskills', LanguageSkillsController::class);
});

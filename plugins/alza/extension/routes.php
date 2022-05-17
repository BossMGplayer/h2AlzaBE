<?php
use Illuminate\Support\Facades\Route;
use Alza\Extension\Controllers\ExtensionsController;
use Alza\Extension\Controllers\ExtensionSkillsController;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('extensions', ExtensionsController::class);
    Route::apiResource('extensionskills', ExtensionSkillsController::class);
});

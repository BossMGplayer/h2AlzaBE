<?php
use Illuminate\Support\Facades\Route;
use Alza\Profession\Controllers\ProfessionsController;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('professions', ProfessionsController::class);
});

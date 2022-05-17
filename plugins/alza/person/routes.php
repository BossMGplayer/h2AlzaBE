<?php
use Illuminate\Support\Facades\Route;
use Alza\Person\Controllers\PeopleController;

Route::group([
    'prefix' => 'api/v1',

], function () {
    Route::apiResource('people', PeopleController::class);
});

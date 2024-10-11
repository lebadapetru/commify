<?php

use App\Http\Controllers\TaxBandController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')
     ->middleware([])
     ->group(function () {
         TaxBandController::routes();
     });

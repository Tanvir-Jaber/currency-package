<?php

use CER\Currency\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::get("/exchange",[CurrencyController::class,"index"]);
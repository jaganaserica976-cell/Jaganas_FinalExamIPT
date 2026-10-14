<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampsiteController;

Route::redirect('/', '/campsites');

Route::resource('campsites', CampsiteController::class)
    ->except(['show']);
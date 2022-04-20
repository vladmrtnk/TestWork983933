<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PublisherController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;

Route::apiResources([
    'publishers' => PublisherController::class,
    'books'      => BookController::class,
    'authors'    => AuthorController::class
]);

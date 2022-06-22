<?php

use App\Http\Controllers\Api\UrlAnswerController;
use Illuminate\Support\Facades\Route;

//Route::get('/url-answers-list', [UrlAnswerController::class, 'index']);
Route::post('/setUrl', [UrlAnswerController::class, 'setUrl']);
//Route::get('/getUrls', [UrlAnswerController::class, 'getUrls']);


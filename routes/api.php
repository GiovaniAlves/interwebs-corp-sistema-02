<?php

use App\Http\Controllers\Api\UrlAnswerController;
use Illuminate\Support\Facades\Route;

Route::get('/url-answers-list', [UrlAnswerController::class, 'index']);
Route::post('/setUrl', [UrlAnswerController::class, 'setUrl']);
Route::get('/url-answer/{url_id}', [UrlAnswerController::class, 'show']);
Route::post('/delete-answer/{url_id}', [UrlAnswerController::class, 'destroy']);
//Route::get('/getUrls', [UrlAnswerController::class, 'getUrls']);


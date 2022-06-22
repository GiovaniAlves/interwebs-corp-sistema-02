<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SaveUrlAnswer;
use App\Jobs\UpdateUrlAnswer;
use App\Models\UrlAnswer;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UrlAnswerController extends Controller
{
    /*public function getUrls()
    {
        // Listar as respostas para o sistema 01
        $response = Http::get('http://localhost:8000/api/urls-list');

        //dd($response->collect());

        SaveUrlAnswer::dispatch($response->collect());
    }*/

    public function setUrl(Request $request)
    {
        if ($urlAnswer = UrlAnswer::where('url_id', $request->url_id)->first()){
            UpdateUrlAnswer::dispatch($urlAnswer, $request->url_name);
        } else {
            $urlAnswer = UrlAnswer::create($request->all());
            SaveUrlAnswer::dispatch($urlAnswer);
        }
    }
}

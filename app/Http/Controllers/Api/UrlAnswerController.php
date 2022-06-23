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
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $urlAnswers = UrlAnswer::select('url_id as id', 'url_name as name', 'status_code', 'body')->orderBy('url_id', 'DESC')->get();

        return response(['urlAnswers' => $urlAnswers], 200);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function setUrl(Request $request)
    {
        if ($urlAnswer = UrlAnswer::where('url_id', $request->url_id)->first()){
            UpdateUrlAnswer::dispatch($urlAnswer, $request->url_name);
        } else {
            $urlAnswer = UrlAnswer::create($request->all());
            SaveUrlAnswer::dispatch($urlAnswer);
        }
    }


    /**
     * @param UrlAnswer $urlAnswer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($url_id)
    {
        $urlAnswer = UrlAnswer::where('url_id', intval($url_id))->first();

        return response(['urlAnswer' => $urlAnswer], 200);
    }

    public function destroy($url_id)
    {
        $urlAnswer = UrlAnswer::where('url_id', $url_id);
        $urlAnswer->delete();
    }
}

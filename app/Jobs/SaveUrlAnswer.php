<?php

namespace App\Jobs;

use App\Models\UrlAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SaveUrlAnswer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $urlAnswer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UrlAnswer $urlAnswer)
    {
        $this->urlAnswer = $urlAnswer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get($this->urlAnswer->url_name);

        $this->urlAnswer->update([
            'status_code' => $response->status(),
            'body' => $response->body()
        ]);
    }
}

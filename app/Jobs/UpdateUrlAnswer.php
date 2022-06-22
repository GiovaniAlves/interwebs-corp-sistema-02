<?php

namespace App\Jobs;

use App\Models\UrlAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class UpdateUrlAnswer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $urlAnswer;
    protected $newUrlName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UrlAnswer $urlAnswer, $newUrlName)
    {
        $this->urlAnswer = $urlAnswer;
        $this->newUrlName = $newUrlName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get($this->newUrlName);

        $this->urlAnswer->update([
            'url_name' => $this->newUrlName,
            'status_code' => $response->status(),
            'body' => $response->body()
        ]);
    }
}

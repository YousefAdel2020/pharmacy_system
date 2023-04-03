<?php

namespace App\Jobs;

use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVerifyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $client;

    /**
     * Create a new job instance.
     */
    public function __construct($client)
    {
        $this->client=$client;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         event(new Registered($this->client));
    }
}

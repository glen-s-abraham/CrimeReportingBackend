<?php

namespace App\Jobs;

use App\Mail\ComplaintSubmittedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ComplaintSubmitted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $mailId;
    protected $message;
    public function __construct($mailId,$message)
    {
        $this->mailId=$mailId;
        $this->message=$message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailId)
            ->send(new ComplaintSubmittedMail($this->message));
    }
}

<?php

namespace App\Listeners;

use App\Events\SupportReplied;
use App\Mail\SupportRepliedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailWhenSupportReplied
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SupportReplied $event): void
    {
        $reply = $event->reply();
        Mail::to($reply->user['email'])->send(
            new SupportRepliedMail($reply)
        );

    }
}

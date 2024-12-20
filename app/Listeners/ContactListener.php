<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Events\ContactRequestRequest;
use App\Mail\PropertyContactMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContactListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestEvent $event): void
    {
        $this->mailer->send(new PropertyContactMail($event->property,$event->data));

    }
}

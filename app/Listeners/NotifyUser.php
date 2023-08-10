<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUser
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
    public function handle(UserCreated $event): void
    {


         $userData = $event->userData;
        $username = $userData['username'];
        $useremail = $userData['useremail'];

            Mail::to($event->userData['useremail'])->send(new RegistrationConfirmationMail($event->userData['username']));
     }

    }


<?php

namespace App\Services;

use App\Mail\AdminNewQuoteMail;
use App\Mail\UserApprovedQuoteMail;
use App\Mail\UserNewQuoteMail;
use App\Mail\UserRejectedQuoteMail;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;

class QuoteMailer
{
    public function sendUserCreated(Quote $quote): void
    {
        // Send to the user
        Mail::to($quote->email)->send(new UserNewQuoteMail($quote));

        // Send to the admin
        Mail::to(config('mail.from.address'))->send(new AdminNewQuoteMail($quote));
    }

    public function sendUserApproved(Quote $quote): void
    {
        Mail::to($quote->email)->send(new UserApprovedQuoteMail($quote));
    }

    public function sendUserRejected(Quote $quote): void
    {
        Mail::to($quote->email)->send(new UserRejectedQuoteMail($quote));
    }
}

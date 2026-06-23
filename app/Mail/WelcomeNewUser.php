<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeNewUser extends Mailable
{
    use Queueable, SerializesModels;

    public int $expiresInMinutes;

    public function __construct(
        public User $user,
        public string $resetUrl,
    ) {
        $broker = config('auth.defaults.passwords', 'users');
        $this->expiresInMinutes = (int) config("auth.passwords.{$broker}.expire", 60);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to EVFast - Set Your Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }
}

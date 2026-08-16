<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $otp,
        public string $context,
        public int $expiryMinutes
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->context === 'register'
            ? 'رمز تفعيل حسابك'
            : 'رمز إعادة تعيين كلمة المرور';

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.otp',
        );
    }
}

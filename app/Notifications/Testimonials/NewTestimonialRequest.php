<?php

namespace App\Notifications\Testimonials;

use App\Models\TestimonialRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewTestimonialRequest extends Notification
{
    use Queueable;
    use SerializesModels;

    public readonly string $url;

    public function __construct(
        public readonly TestimonialRequest $request,
    ) {
        $this->url = URL::signedRoute(
            name: 'pages:testimonials:complete',
            parameters: [
                'request' => $this->request->id,
            ],
            expiration: now()->addWeek(),
        );
    }

    /** @return list<string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->subject(
            subject: 'You have been sent a Testimonial Request',
        )->markdown(
            view: 'mail.testimonials.new-testimonial-request',
            data: [
                'request' => $this->request,
                'url' => $this->url,
            ],
        );
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}

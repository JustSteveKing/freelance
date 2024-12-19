<?php

namespace App\Jobs\Testimonials;

use App\Models\TestimonialRequest;
use App\Notifications\Testimonials\NewTestimonialRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class SendRequest implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly TestimonialRequest $request,
    ) {}

    public function handle(): void
    {
        $this->request->notify(
            instance: new NewTestimonialRequest(
                request: $this->request,
            ),
        );
    }
}

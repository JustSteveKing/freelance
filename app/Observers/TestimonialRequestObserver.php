<?php

namespace App\Observers;

use App\Jobs\Testimonials\SendRequest;
use App\Models\TestimonialRequest;
use Illuminate\Contracts\Bus\Dispatcher;

readonly class TestimonialRequestObserver
{
    public function __construct(
        private Dispatcher $bus,
    ) {}

    public function created(TestimonialRequest $testimonialRequest): void
    {
        $this->bus->dispatch(
            command: new SendRequest(
                request: $testimonialRequest,
            ),
        );
    }
}

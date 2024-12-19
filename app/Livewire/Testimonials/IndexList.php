<?php

declare(strict_types=1);

namespace App\Livewire\Testimonials;

use App\Models\Testimonial;
use App\Models\TestimonialRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class IndexList extends Component
{
    #[Computed]
    public function testimonials(): Collection
    {
        return Testimonial::query()->where(
            column: 'user_id',
            operator: '=',
            value: auth()->id(),
        )->latest()->get();
    }

    #[Computed]
    public function requests(): Collection
    {
        return TestimonialRequest::query()->where(
            column: 'user_id',
            operator: '=',
            value: auth()->id(),
        )->latest()->get();
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.testimonials.index-list',
        );
    }
}

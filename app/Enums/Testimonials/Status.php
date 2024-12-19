<?php

declare(strict_types=1);

namespace App\Enums\Testimonials;

enum Status: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Identity\Provider;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'handle',
        'email',
        'avatar',
        'provider',
        'provider_id',
    ];

    /** @var list<string> */
    protected $hidden = [
        'provider_id',
    ];

    /** @return HasMany<Testimonial,User> */
    public function testimonials(): HasMany
    {
        return $this->hasMany(
            related: Testimonial::class,
            foreignKey: 'user_id',
        );
    }

    /** @return HasMany<TestimonialRequest,User> */
    public function testimonialRequests(): HasMany
    {
        return $this->hasMany(
            related: TestimonialRequest::class,
            foreignKey: 'user_id',
        );
    }

    /** @return array<string,class-string> */
    protected function casts(): array
    {
        return [
            'provider' => Provider::class,
        ];
    }
}

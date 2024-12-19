<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\TestimonialRequestObserver;
use Database\Factories\TestimonialRequestFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[ObservedBy(TestimonialRequestObserver::class)]
final class TestimonialRequest extends Model
{
    /** @use HasFactory<TestimonialRequestFactory> */
    use HasFactory;
    use HasUlids;
    use Notifiable;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'user_id',
    ];

    /** @return BelongsTo<User,TestimonialRequest> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }
}

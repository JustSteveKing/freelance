<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Testimonials\Status;
use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Testimonial extends Model
{
    /** @use HasFactory<TestimonialFactory> */
    use HasFactory;
    use HasUlids;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'role',
        'company',
        'avatar',
        'status',
        'user_id',
    ];

    /** @return BelongsTo<User,Testimonial> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    /** @return array<string,class-string> */
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
}

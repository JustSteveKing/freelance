<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TestimonialRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<TestimonialRequest> */
final class TestimonialRequestFactory extends Factory
{
    /** @var class-string<TestimonialRequest> */
    protected $model = TestimonialRequest::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'user_id' => User::factory(),
        ];
    }
}

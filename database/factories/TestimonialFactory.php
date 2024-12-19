<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Testimonials\Status;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Testimonial> */
final class TestimonialFactory extends Factory
{
    /** @var class-string<Testimonial> */
    protected $model = Testimonial::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'role' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'avatar' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(
                array: Status::cases(),
            ),
            'content' => $this->faker->realText(),
            'user_id' => User::factory(),
        ];
    }
}

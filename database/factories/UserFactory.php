<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Identity\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<User> */
final class UserFactory extends Factory
{
    /** @var class-string<User> */
    protected $model = User::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'handle' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => $this->faker->imageUrl(),
            'provider' => Provider::GitHub,
            'provider_id' => Str::random(16),
        ];
    }
}

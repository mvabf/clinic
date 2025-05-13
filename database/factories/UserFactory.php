<?php

namespace Database\Factories;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'type' => fake()->randomElement(UserTypeEnum::cases())->value,
        ];
    }
}

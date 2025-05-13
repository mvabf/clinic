<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'reference' => fake()->randomElement(RoleEnum::cases())->value,
        ];
    }

    public function withReference(string $reference): Factory
    {
        return $this->state(fn () => ['reference' => $reference]);
    }
}

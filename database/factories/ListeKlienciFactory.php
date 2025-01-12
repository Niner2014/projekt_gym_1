<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListeKlienciFactory extends Factory
{
    protected $model = \App\Models\ListeKlienci::class; 

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'tags' => $this->faker->words(3, true),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

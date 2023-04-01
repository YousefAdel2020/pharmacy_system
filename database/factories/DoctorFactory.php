<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'national_id' => $this->faker->numberBetween(100000, 200000),
            'avatar'=> 'storage/unknown.png',
            'is_banned' => false,
            'pharmacy_id'=> Pharmacy::inRandomOrder()->first()->id,
        ];
    }
}

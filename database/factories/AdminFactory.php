<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    // protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'name' =>'Ahmed Ali',
            // 'mobile_number' =>'01120266837',
            // // 'email' => $this->faker->unique()->safeEmail(),
            // // 'email_verified_at' => now(),
            // 'password' =>Hash::make('password'),
        ];
    }
}

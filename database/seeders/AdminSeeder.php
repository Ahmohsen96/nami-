<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory(1)->create();
        // for ($i=0;$i<=100;$i++){
            Admin::create([
                'name' =>'Ahmed Ali',
                'mobile_number' =>'01120266837',
                // 'email' => $this->faker->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                'password' =>Hash::make('password'),
            ]);

    }
}

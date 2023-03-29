<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create();

        $user = User::create([
            'name' => 'doctor_1',
            'password' => Hash::make("123456"),
            'national_id' => '22222000022222',
            'email' => 'doctor_1@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_insured' => true,

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Pharmacy;
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
        $user = User::create([
            'name' => 'pharmacy1',
            'email' => 'pharmacy1@pharmacy.com',
            'password' => bcrypt('123456'),
            'typeable_type' => 'app\Models\Medicine',
            'typeable_id' => '2'
        ]);


        $user1 = User::create([
            'name' => 'Doctor1',
            'email' => 'doctor@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type' => 'app\Models\Doctor',
            'typeable_id' => '3'
        ]);

        $pharmacy = Pharmacy::create([
            'name' => 'pharmacy1',
            'email' => 'pharmacy1@pharmacy.com',
            'password' => bcrypt('123456'),
            'national_id' => '123456789',
            'avatar' => '',
            'priority' => '1',
            'is_deleted' => '1'
        ]);

        $doctor = Doctor::create([
            'name' => 'Doctor1',
            'email' => 'doctor@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '123456789',
            'avatar' => '',
            'is_banned' => false,
            'pharmacy_id' => '1'
        ]);
    }
}

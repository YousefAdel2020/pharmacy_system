<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pharmacy = Pharmacy::create([
            'name' => 'pharmacy1',
            'email' => 'pharmacy1@pharmacy.com',
            'password' => bcrypt('123456'),
            'national_id' => '123456789',
            'avatar' => '',
            'priority' => '1',
            'is_deleted'=> '1'
        ]);

        $user = User::create([
            'name' => 'pharmacy1',
            'email' => 'pharmacy1@pharmacy.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Pharmacy',
            'typeable_id'=> $pharmacy->id
        ]);

        $user = $user->refresh();
        $pharmacy=$pharmacy->refresh();

        $pharmacy->type()->save($user);
        $user->assignRole('pharmacy');

        ////////////////////////////////////

        $pharmacy = Pharmacy::create([
            'name' => 'pharmacy2',
            'email' => 'pharmacy2@pharmacy.com',
            'password' => bcrypt('123456'),
            'national_id' => '123456789',
            'avatar' => '',
            'priority' => '1',
            'is_deleted'=> '1'
        ]);

        $user = User::create([
            'name' => 'pharmacy2',
            'email' => 'pharmacy2@pharmacy.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Pharmacy',
            'typeable_id'=> $pharmacy->id
        ]);

        $user = $user->refresh();
        $pharmacy=$pharmacy->refresh();

        $pharmacy->type()->save($user);
        $user->assignRole('pharmacy');
        /////////////////////////////////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '123456789',
            'avatar'=> '',
            'pharmacy_id'=> '1'
        ]);

        $user1 = User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '1'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '1234567899',
            'avatar'=> '',
            'pharmacy_id'=> '1'
        ]);

        $user1 = User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '2'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor3',
            'email' => 'doctor3@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '1234567989',
            'avatar'=> '',
            'pharmacy_id'=> '1'
        ]);

        $user1 = User::create([
            'name' => 'Doctor3',
            'email' => 'doctor3@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '3'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor4',
            'email' => 'doctor4@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '1234596789',
            'avatar'=> '',
            'pharmacy_id'=> '2'
        ]);

        $user1 = User::create([
            'name' => 'Doctor4',
            'email' => 'doctor4@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '4'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor5',
            'email' => 'doctor5@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '1234956789',
            'avatar'=> '',
            'pharmacy_id'=> '2'
        ]);

        $user1 = User::create([
            'name' => 'Doctor5',
            'email' => 'doctor5@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '5'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor6',
            'email' => 'doctor6@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '12349956789',
            'avatar'=> '',
            'pharmacy_id'=> '2'
        ]);

        $user1 = User::create([
            'name' => 'Doctor6',
            'email' => 'doctor6@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '6'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////

        $doctor = Doctor::create([
            'name' => 'Doctor7',
            'email' => 'doctor7@doctor.com',
            'password' => bcrypt('123456'),
            'national_id' => '1923456789',
            'avatar'=> '',
            'pharmacy_id'=> '2'
        ]);

        $user1 = User::create([
            'name' => 'Doctor7',
            'email' => 'doctor7@doctor.com',
            'password' => bcrypt('123456'),
            'typeable_type'=> 'app\Models\Doctor',
            'typeable_id'=> '7'
        ]);

        $user1 = $user1->refresh();
        $doctor=$doctor->refresh();

        $doctor->type()->save($user1);
        $user1->assignRole('doctor');

        ///////////////////////////////////////////
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'pharmacy-list',
            'pharmacy-create',
            'pharmacy-edit',
            'pharmacy-delete',

            'doctor-list',
            'doctor-create',
            'doctor-edit',
            'doctor-delete',

            'address-list',
            'address-create',
            'address-edit',
            'address-delete',

            'area-all',


            'medicine-list',
            'medicine-create',
            'medicine-edit',
            'medicine-delete',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

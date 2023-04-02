<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $permissions = [
            'admin',

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

            'ban',
            'unban',
            
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

        $roleAdmin = Role::create(['name'=>'admin']);
        $adminPermissions = Permission::whereIn('name', [
            'admin',
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
            'ban',
            'unban',
            'address-list',
            'address-create',
            'address-edit',
            'address-delete',
            'area-all',
            'medicine-list',
            'medicine-create',
            'medicine-edit',
            'medicine-delete',
        ])->get();
        $roleAdmin->syncPermissions($adminPermissions);


        $roleDoctor = Role::create(['name'=> 'doctor']);
        $doctorPermissions = Permission::whereIn('name', [
        'user-list',
        'doctor-edit',
        'medicine-list',
        'medicine-create',
        'medicine-edit',
        'medicine-delete'])->get();
        $roleDoctor->syncPermissions($doctorPermissions);


        $rolePharmacy = Role::create(['name'=>'pharmacy']);
        $pharmacyPermissions = Permission::whereIn('name', [
            'user-list',
            'doctor-edit',
            'medicine-list',
            'medicine-create',
            'medicine-edit',
            'medicine-delete',
            'ban',
            'unban',
            'pharmacy-edit',
            'doctor-list',
            'doctor-create'
            ])->get();
        $rolePharmacy->syncPermissions($pharmacyPermissions);
    }
}

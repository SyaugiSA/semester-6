<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Permission::truncate();
        $superAdmin = Role::create([
            'name'      => 'Super Admin',
            'guard_name'=> 'web'
        ]);
        $admin = Role::create([
            'name'      => 'Admin',
            'guard_name'=> 'web'
        ]);
        $user = Role::create([
            'name'      => 'User',
            'guard_name'=> 'web'
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

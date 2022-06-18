<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        $superAdmnin = User::create([
            'name'=>'SuperAdmin',
            'email'=>'superadmin@admin.com',
            'password'=>bcrypt('superadmin'),
        ]);
        $superAdmnin->syncRoles('Super Admin');

        Schema::enableForeignKeyConstraints();
    }
}

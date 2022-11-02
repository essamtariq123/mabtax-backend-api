<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);

        $admin =  Admin::create([
            'name' => 'admin',
            'email' => 'admin@mabtax.com',
            'password' => bcrypt('mabtax!@123')
        ]);

        $admin->assignRole('admin');
    }
}

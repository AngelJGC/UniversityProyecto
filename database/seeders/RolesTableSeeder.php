<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'user_id'=> 'student',
            'code'=> Str::random(10),
            'password' => bcrypt('veteringo2')
        ]);

        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'user_id'=> 'teacher',
            'code'=> Str::random(10),
            'password' => bcrypt('veteringo2')
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_id'=> 'admin',
            'password' => bcrypt('veteringo2')
        ]);
    }
}

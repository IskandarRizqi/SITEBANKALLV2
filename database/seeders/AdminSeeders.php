<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Root',
            'email' => 'root@root.root',
            'password' => Hash::make('rootADMINsuper321'),
            'role' => 0,
        ]);
    }
}

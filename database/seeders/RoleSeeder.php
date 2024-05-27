<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $uuid = Str::uuid()->toString();
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'uuid' => $uuid,
                'status' => 'active',
            ],
            [
                'name' => 'Manager',
                'uuid' => $uuid,
                'status' => 'active',
            ],
            [
                'name' => 'Supervisor',
                'uuid' => $uuid,
                'status' => 'active',
            ],
            [
                'name' => 'Staff',
                'uuid' => $uuid,
                'status' => 'active',
            ]


        ]);
    }
}

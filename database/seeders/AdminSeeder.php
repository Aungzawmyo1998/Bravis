<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $uuid = Str::uuid()->toString();
        DB::table('admins') -> insert( [
            'name' => 'Aung Zaw Myo',
            'email' => 'mraungzaw303@gmail.com',
            'address' => 'Dawei',
            'role_id' => 1,
            'phone' => '09942172699',
            'password' => bcrypt('12345678'),
            'image' => '-',
            'uuid' => $uuid,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

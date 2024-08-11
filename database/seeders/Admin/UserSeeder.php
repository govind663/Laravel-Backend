<?php

namespace Database\Seeders\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Abhishek G Jha',
            'role_id' => '2',
            'email' => 'hod@gmail.com',
            'password' => Hash::make('1234567890'),
            'created_by' => '1',
            'created_at' => Carbon::now()
        ]);
    }
}

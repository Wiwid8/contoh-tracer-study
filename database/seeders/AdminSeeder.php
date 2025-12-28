<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'email' => 'admin@tracer.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        Admin::create([
            'user_id' => $user->id,
            'fullname' => 'Administrator Tracer Study',
            'gender' => 'L',
            'date_of_birth' => '1990-01-01',
            'phone' => '081234567890',
            'address' => 'Kampus Utama',
            'job_title' => 'System Administrator',
        ]);
    }
}


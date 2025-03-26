<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->withRole('admin')->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->withRole('recruiter')->create([
            'name' => 'Recruiter User',
            'email' => 'recruiter@recruiter.com',
        ]);

        User::factory()->withRole('candidate')->create([
            'name' => 'Candidate User',
            'email' => 'candidate@candidate.com',
        ]);

    }
}

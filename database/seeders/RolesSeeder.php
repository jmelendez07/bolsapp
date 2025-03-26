<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $recruiter = Role::create(['name' => 'recruiter']);
        $candidate = Role::create(['name' => 'candidate']);

        $viewAnyCandidate = Permission::create(['name' => 'view any candidate']);
        $createCandidate = Permission::create(['name' => 'create candidate']);
        $updateCandidate = Permission::create(['name' => 'update candidate']);
        $deleteCandidate = Permission::create(['name' => 'delete candidate']);

        $createJob = Permission::create(['name' => 'create job']);
        $updateJob = Permission::create(['name' => 'update job']);
        $deleteJob = Permission::create(['name' => 'delete job']);

        $createRequest = Permission::create(['name' => 'create request']);
        $updateRequest = Permission::create(['name' => 'update request']);
        $deleteRequest = Permission::create(['name' => 'delete request']);

        $admin->givePermissionTo(Permission::all());
        $recruiter->givePermissionTo([
            $createJob,
            $updateJob,
            $deleteJob,
            $updateRequest,
            $deleteRequest,
            $viewAnyCandidate
        ]);
        $candidate->givePermissionTo([
            $createCandidate,
            $updateCandidate,
            $deleteCandidate,
            $createRequest
        ]);
    }
}

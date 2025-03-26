<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->hasRole('admin') || $user->hasRole('recruiter');
    }

    public function update(User $user, Job $job): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        
        return $user->hasRole('recruiter') && $user->id === $job->recruiter_id;
    }

    public function delete(User $user, Job $job): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        
        return $user->hasRole('recruiter') && $user->id === $job->recruiter_id;
    }
}

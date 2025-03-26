<?php

namespace App\Policies;

use App\Models\Request;
use App\Models\User;
use App\Models\Job;
use Illuminate\Auth\Access\Response;

class RequestPolicy
{
    
    public function view(User $user, Request $request): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('recruiter') && $user->id === $request->job->recruiter_id) {
            return true;
        }

        return $user->id === $request->user_id;
    }

    public function create(User $user, Job $job): bool
    {
        return $user->hasRole('candidate') && $job->requests()->where('user_id', $user->id)->doesntExist();
    }

    public function update(User $user, Request $request): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('recruiter') && $user->id === $request->job->recruiter_id) {
            return true;
        }

        return $user->id === $request->user_id;
    }

    public function delete(User $user, Request $request): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('recruiter') && $user->id === $request->job->recruiter_id) {
            return true;
        }

        return $user->id === $request->user_id;
    }
}

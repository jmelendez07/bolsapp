<?php

namespace App\Policies;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CandidatePolicy
{

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin') || $user->hasRole('recruiter');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('candidate');
    }

    public function update(User $user, Candidate $candidate): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->id === $candidate->user_id;
    }

    public function delete(User $user, Candidate $candidate): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->id === $candidate->user_id;
    }
}

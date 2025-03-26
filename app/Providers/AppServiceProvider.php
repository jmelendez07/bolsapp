<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\Request;
use App\Models\Candidate;
use App\Policies\JobPolicy;
use App\Policies\RequestPolicy;
use App\Policies\CandidatePolicy;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policies([
            Job::class => JobPolicy::class,
            Candidate::class => CandidatePolicy::class,
            Request::class => RequestPolicy::class,
        ]);
    }
}

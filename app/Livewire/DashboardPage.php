<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard')]
class DashboardPage extends Component
{
    public $role;

    public function mount()
    {
        if (Auth::user()->hasRole('admin')) {
            $this->role = 'admin';
        } elseif (Auth::user()->hasRole('recruiter')) {
            $this->role = 'recruiter';
        } elseif (Auth::user()->hasRole('candidate')) {
            $this->role = 'candidate';
        } else {
            $this->role = null;
        }
    }

    public function render()
    {
        return view('livewire.dashboard-page');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SidebarDashboard extends Component
{
    public function render()
    {
        return view('livewire.sidebar-dashboard');
    }
}

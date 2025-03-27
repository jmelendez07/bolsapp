<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard')]
class DashboardPage extends Component
{
    public function render()
    {
        return view('livewire.dashboard-page');
    }
}

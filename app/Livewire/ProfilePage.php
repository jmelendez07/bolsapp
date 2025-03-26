<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard')]
class ProfilePage extends Component
{
    public function render()
    {
        return view('livewire.profile-page');
    }
}

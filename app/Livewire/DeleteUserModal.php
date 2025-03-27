<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class DeleteUserModal extends Component
{

    public $showModal = false;
    public User $user;

    public function delete()
    {
        if (Auth::user()->id !== $this->user->id) {
            $this->user->delete();
            $this->showModal = false;
        } else {
        
        }
    }

    #[On('openDeleteModal')]
    public function openModal($userId)
    {    
        $this->user = User::find($userId);
        $this->showModal = true;
    }

    #[On('closeDeleteModal')]
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('components.delete-user-modal');
    }
}

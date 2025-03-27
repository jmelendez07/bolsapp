<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateUserForm;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class EditUserModal extends Component
{
    public $showModal = false;
    public User $user;
    public UpdateUserForm $form;

    #[On('openEditModal')]
    public function openModal($userId)
    {    
        $this->user = User::find($userId);
        $this->form->name = $this->user->name;
        $this->form->email = $this->user->email;
        $this->showModal = true;
    }

    #[On('closeEditModal')]
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function update() 
    {
        $this->form->save($this->user);
        $this->showModal = false;
    }

    public function render()
    {
        return view('components.edit-user-modal');
    }
}

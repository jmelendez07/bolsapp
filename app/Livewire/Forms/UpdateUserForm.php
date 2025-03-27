<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateUserForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|lowercase|email|max:255|unique:users,email')]
    public $email = '';

    #[Validate('required|string|exists:roles,name')]
    public $role = '';

    public function save($user)
    {
        $this->validate();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->syncRoles([$this->role]);
        
        $user->save();
    }
}

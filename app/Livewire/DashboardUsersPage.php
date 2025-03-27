<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.dashboard')]
class DashboardUsersPage extends Component
{
    use WithPagination;

    public $view = 'table';
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterRole = '';

    public function changeView($viewMode)
    {
        $this->view = $viewMode;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterRole, function ($query) {
                return $query->whereHas('roles', function ($q) {
                    $q->where('name', $this->filterRole);
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.dashboard-users-page', [
            'users' => $users,
            'roles' => Role::all()
        ]);
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
#[Title('User List')]
class Users extends Component
{
    use WithPagination;
    public $recordPerPage = 10;
    public $perPageRecords = [5,10,15,20,30,40,50];
    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::paginate($this->recordPerPage)
        ]);
    }

    public function updatingRecordPerPage()
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    }
}

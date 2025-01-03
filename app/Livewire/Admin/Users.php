<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
#[Title('User List')]
class Users extends Component
{
    use WithPagination;
    public $recordPerPage = 10;
    public $perPageRecords = [5,10,15,20,30,40,50];

    // Modal-related properties
    public $isOpen = false; // Controls the modal visibility
    public $userId;         // The ID of the user being edited
    #[Rule('required')]
    public $name;   // Fields for editing
    #[Rule('required|email')]
    public $email;   // Fields for editing

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

    // Open the modal and load user details
    public function openModal($id)
    {
        $this->userId = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isOpen = true;
    }

    // Close the modal and reset fields
    public function closeModal()
    {
        $this->reset(['isOpen', 'name', 'email', 'userId']);
    }

    // Save the edited user details
    public function saveUser()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->closeModal();
        session()->flash('message', 'User details updated successfully!');
    }
}

<?php

namespace App\Livewire\Authentication;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Admin Login')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';
    #[Rule('required')]
    public $password = '';

    public function render()
    {
        return view('livewire.authentication.login');
    }

    public function login()
    {
        $this->validate();
        $credentials = ['email' => $this->email, 'password' => $this->password];
        if (Auth::guard('admin')->attempt($credentials)) {
            session()->flash('success', 'Login Success.');
            $this->redirect('/dashboard', true);
        } else {
            session()->flash('error', 'Invalid login credentials.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

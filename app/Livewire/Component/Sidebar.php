<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Sidebar extends Component
{
    public $navBar = [
        [
            'url' => 'dashboard',
            'label' => 'Dashboard',
            'isActive' => false
        ],
        [
            'url' => 'counter',
            'label' => 'Counter',
            'isActive' => false
        ],
        [
            'url' => 'users',
            'label' => 'Users',
            'isActive' => false
        ],
    ];
    public function render()
    {
        return view('livewire.component.sidebar');
    }
}

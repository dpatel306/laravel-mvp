<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Counter')]
class Counter extends Component
{
    public $count = 0;

    public function increment():void{
        $this->count++;
    }
    public function decrement():void{
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}

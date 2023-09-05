<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}

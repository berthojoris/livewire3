<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Blog')]

class Blog extends Component
{
    public function render()
    {
        return view('livewire.blog');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Detail')]

class BlogOpenDetail extends Component
{
    public function render()
    {
        return view('livewire.blog-open-detail');
    }
}

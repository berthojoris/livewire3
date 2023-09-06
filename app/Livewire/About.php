<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About')]

class About extends Component
{
    // [2023-09-04 03:30:48] local.DEBUG: boot
    // [2023-09-04 03:30:48] local.DEBUG: mount
    // [2023-09-04 03:30:48] local.DEBUG: rendering
    // [2023-09-04 03:30:48] local.DEBUG: rendered
    // [2023-09-04 03:30:48] local.DEBUG: dehydrate

    public function mount()
    {
        // $this->js("alert('monted')");
        // logger("mount");
    }

    public function render()
    {
        return view('livewire.about');
    }
}

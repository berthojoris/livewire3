<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kontrak')]

class KontrakIndex extends Component
{
    public function render()
    {
        return view('livewire.kontrak-index');
    }
}

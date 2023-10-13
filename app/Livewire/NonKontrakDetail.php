<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Non Kontrak Detail')]
class NonKontrakDetail extends Component
{
    public function render()
    {
        return view('livewire.non-kontrak-detail');
    }
}

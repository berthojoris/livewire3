<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Report')]

class ReportIndex extends Component
{
    public function render()
    {
        return view('livewire.report-index');
    }
}

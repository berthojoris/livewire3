<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About')]

class About extends Component
{
	public function mount()
	{
		$this->js("alert('monted')");
	}

    public function render()
    {
        return view('livewire.about');
    }
}

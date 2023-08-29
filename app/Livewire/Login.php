<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.login')]

class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }

	public function login()
	{
		dd("yeay");
	}
}

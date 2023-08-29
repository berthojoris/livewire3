<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\LoginForm;

#[Layout('layouts.login')]
#[Title('Login')]

class Login extends Component
{
	public LoginForm $form;

    public function render()
    {
        return view('livewire.login');
    }

	public function login()
	{
		$this->form->login();
	}
}

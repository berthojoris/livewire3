<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

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

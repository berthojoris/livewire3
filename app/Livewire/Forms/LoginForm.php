<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule(['required', 'email'])]
	public string $email = "";

	#[Rule(['required'])]
	public string $password = "";

	public function login()
	{
		$validated = $this->validate();

		dd("yeay");
	}
}

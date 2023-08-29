<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Rule;

class BlogPost extends Form
{
    #[Rule(['required'])]
	public string $title = "";

	#[Rule(['required'])]
	public string $body = "";


	public function save(): void
    {
		$validated = $this->validate();

		$user = User::find(1);

		$user->blogs()->create($validated);

		$this->reset();
    }
}

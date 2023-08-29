<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\BlogPost;

#[Title('Blog')]

class Blog extends Component
{
	public BlogPost $form;

    public function render()
    {
        return view('livewire.blog');
    }

	public function store()
    {
		$this->form->save();
    }
}

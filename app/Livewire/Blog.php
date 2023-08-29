<?php

namespace App\Livewire;

use App\Livewire\Forms\BlogPost;
use Livewire\Attributes\Title;
use Livewire\Component;

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

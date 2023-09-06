<?php

namespace App\Livewire;

use App\Livewire\Forms\BlogPost;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail')]

class BlogOpenDetail extends Component
{
    public BlogPost $form;

    public function mount($id)
    {
        $this->form->setBlog($id);
    }

    public function update()
    {
        $this->form->update();
    }

    public function render()
    {
        return view('livewire.blog-open-detail');
    }
}

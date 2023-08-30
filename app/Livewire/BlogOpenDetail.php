<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\BlogPost;

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

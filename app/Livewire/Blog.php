<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\BlogPost;

#[Title('Blog')]
#[Layout('layouts.post')]

class Blog extends Component
{
    public BlogPost $form;

    public function render()
    {
		$blog = \App\Models\Blog::query()->latest()->get();
        return view('livewire.blog', [
			'blogs' => $blog
		]);
    }

    public function store()
    {
        $this->form->save();
    }

	public function clearDb()
    {
        \App\Models\Blog::truncate();
    }
}

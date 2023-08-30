<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\BlogPost;

#[Title('Post')]
#[Layout('layouts.post')]

class PostIndex extends Component
{
	public BlogPost $form;
	use WithPagination;

    public function render()
    {
		$blog = Blog::query()->latest()->simplePaginate(5);
        return view('livewire.post-index', [
			'blogs' => $blog
		]);
    }

	public function store()
    {
        $this->form->save();
    }

	public function remove($id)
    {
        $this->form->delete($id);
    }

	public function detail($id)
    {
        $this->form->openDetail($id);
    }
}

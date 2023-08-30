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

	public function mount(\App\Models\Blog $blog)
    {
        $this->blog = $blog;
    }

    public function store()
    {
        $this->form->save();
		// $this->js("alert('Blog saved!')");
    }

	// public function updated($name, $value)
    // {
	// 	logger("updated");
    //     $this->blog->update([
    //         $name => $value,
    //     ]);
    // }

	public function clearDb()
    {
        \App\Models\Blog::truncate();
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

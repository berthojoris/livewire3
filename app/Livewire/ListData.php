<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('List Data')]
#[Layout('layouts.no_side_bar')]

class ListData extends Component
{
	public $data;

	public function mount()
    {
        $this->data = Blog::all();
    }

    public function render()
    {
        return view('livewire.list-data', [
			'blogs' => $this->data
		]);
    }
}

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
    public function render()
    {
		$blog = Blog::all();
        return view('livewire.list-data', [
			'blogs' => $blog
		]);
    }
}

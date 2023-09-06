<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

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
            'blogs' => $this->data,
        ]);
    }
}

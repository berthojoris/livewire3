<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Blog;
use App\Models\User;
use Livewire\Attributes\Rule;

class BlogPost extends Form
{
    #[Rule(['required'])]
    public string $title = '';

    #[Rule(['required'])]
    public string $body = '';

    public function save(): void
    {
        $validated = $this->validate();
        $user = auth()->user();
        $user->blogs()->create($validated);
        flash('Berhasil menambahkan data', 'success');
        $this->reset();
    }

	public function delete($id) {
		$data = Blog::whereId($id)->delete();
        flash('Berhasil menghapus data', 'success');
	}

	public function openDetail($id) {

		$data = Blog::whereId($id)->firstOrFail();
		return redirect()->route('blog_open_detail', $data->id);
	}
}

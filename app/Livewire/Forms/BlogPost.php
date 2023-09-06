<?php

namespace App\Livewire\Forms;

use App\Models\Blog;
use Livewire\Attributes\Rule;
use Livewire\Form;

class BlogPost extends Form
{
    #[Rule(['required'])]
    public string $title = '';

    #[Rule(['required'])]
    public string $body = '';

    public ?Blog $blog;

    public function setBlog($id)
    {
        $blog = Blog::whereId($id)->firstOrFail();
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->body = $blog->body;
    }

    public function save()
    {
        $validated = $this->validate();
        $user = auth()->user();
        $user->blogs()->create($validated);
        flash('Berhasil menambahkan data', 'success');
        $this->reset();
    }

    public function update()
    {
        $validated = $this->validate();
        $this->blog->update($validated);
        flash('Berhasil mengupdate data', 'success');
        $this->reset();

        return redirect()->route('post');
    }

    public function delete($id)
    {
        $data = Blog::whereId($id)->delete();
        flash('Berhasil menghapus data', 'success');
    }

    public function openDetail($id)
    {

        $data = Blog::whereId($id)->firstOrFail();

        return redirect()->route('blog_open_detail', $data->id);
    }
}

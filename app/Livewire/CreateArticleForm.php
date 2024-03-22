<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $category;
    #[Validate('required')]
    public $body;
    public $images = [];
    public $temporary_images;
    public $article;

    public function updatedTemporaryImages()
    {
        if ($this->validate(['temporary_images.*' => 'image'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function save()
    {
        $this->validate();
        $category = Category::find($this->category);
        $this->article = $category->articles()->create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id()
        ]);
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $this->article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }
        $this->reset();

        // $article = Category::find($this->category)->articles()->create(
        //     [
        //         'title' => $this->title,
        //         'body' => $this->body,
        //     ]
        // );
        // $article->user()->associate(Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}

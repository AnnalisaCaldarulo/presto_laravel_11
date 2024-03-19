<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $category;
    #[Validate('required')]
    public $body;

    // protected $rules = [
    //     'title' => 'required',
    //     'category' => 'required',
    //     'body' => 'required'

    // ];
    public function save()
    {
        $this->validate();
        $category = Category::find($this->category);
        $article = $category->articles()->create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id()
        ]);
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

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    public $title, $category, $body;

    protected $rules = [
        'title' => 'required',
        'category' => 'required',
        'body' => 'required'

    ];
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
        dd($article);
    }
    public function render()
    {
        return view('livewire.create-article-form');
    }
}

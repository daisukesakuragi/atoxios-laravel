<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArticleCard extends Component
{
    public $article;

    public function mount($article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.article-card');
    }
}

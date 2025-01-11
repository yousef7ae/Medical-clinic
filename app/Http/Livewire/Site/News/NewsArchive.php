<?php

namespace App\Http\Livewire\Site\News;

use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class NewsArchive extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(){


    }

    public function render()
    {
        $posts = Post::orderBy('created_at', "DESC")->paginate(4);

        return view('livewire.site.news.news-archive',compact('posts'))->layout('layouts.site.app');
    }
}

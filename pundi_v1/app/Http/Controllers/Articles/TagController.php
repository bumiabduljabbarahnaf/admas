<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;

// Models
use App\Models\Articles;

class TagController extends Controller
{
    protected $view  = 'pages.articles.';
    protected $path  = '/images/artikel/';

    public function index($tag)
    {
        $path = $this->path;

        $articles = Articles::select('id', 'category_id', 'sub_category_id', 'author_id', 'image', 'title', 'title_slug', 'content', 'created_at')
            ->with(['category', 'sub_category', 'user'])
            ->where('tag', 'like', '%' . $tag . '%')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view($this->view . 'tag', compact(
            'articles',
            'path',
            'tag'
        ));
    }
}

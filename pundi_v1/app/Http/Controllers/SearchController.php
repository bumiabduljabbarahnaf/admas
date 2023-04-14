<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Asip Hamdi
 * Github : axxpxmd
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Articles;

class SearchController extends Controller
{
    protected $view = 'pages.';
    protected $path = '/images/artikel/';

    public function index(Request $request)
    {
        $path   = $this->path;
        $result = $request->n_article;

        $articles = Articles::where('title', 'like', '%' . $result . '%')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view($this->view . 'search', compact(
            'path',
            'articles',
            'result',
            'path'
        ));
    }
}

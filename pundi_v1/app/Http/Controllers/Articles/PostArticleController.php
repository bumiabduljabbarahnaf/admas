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

namespace App\Http\Controllers\Articles;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Articles;
use App\Models\Category;
use App\Models\SubCategory;

class PostArticleController extends Controller
{
    protected $view  = 'pages.articles.';
    protected $route = 'article.post.';
    protected $path  = '/images/artikel/';

    public function index(Request $request)
    {
        $route = $this->route;

        $category = Category::select('id', 'n_category')->whereNotIn('id', [5])->get();
        $category_id = ($request->category_id == '' ? '' : $request->category_id);

        return view($this->view . 'post', compact(
            'route',
            'category',
            'category_id'
        ));
    }

    public function subCategoryByCategory($category_id)
    {
        return SubCategory::select('id', 'n_sub_category')->where('category_id', $category_id)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|unique:articles,title',
            'image'   => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'content' => 'required|min:500',
            'tag'     => 'required',
            'category_id'     => 'required',
            'sub_category_id' => 'required',
            'source_image'    => 'required'
        ]);

        // Get Param
        $title   = $request->title;
        $content = $request->content;
        $tag     = $request->tag;
        $author_id       = Auth::user()->id;
        $category_id     = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $source_image    = $request->source_image;

        // Saved Photo to Storage
        $file     = $request->file('image');
        $fileName = time() . "." . $file->getClientOriginalName();
        $request->file('image')->storeAs($this->path, $fileName, 'ftp', 'public');

        $article = new Articles();
        $article->title      = $title;
        $article->title_slug = str_slug($title);
        $article->content = $content;
        $article->tag     = $tag;
        $article->image   = $fileName;
        $article->category_id     = $category_id;
        $article->sub_category_id = $sub_category_id;
        $article->source_image    = $source_image;
        $article->author_id       = $author_id;
        $article->save();

        return redirect()
            ->route($this->route . 'index', Auth::user()->id)
            ->withSuccess('Selamat! Tulisan berhasil terkirim');
    }
}

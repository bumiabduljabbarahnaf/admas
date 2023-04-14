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

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Articles;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    protected $view = 'pages.subCategory.';
    protected $path = '/images/artikel/';

    public function index($n_sub_category)
    {
        $path   = $this->path;
        $params = str_replace('-', ' ', $n_sub_category);

        $subCategory = SubCategory::with('category')->where('n_sub_category', $params)->first();

        $articles = Articles::with(['category', 'sub_category', 'user'])->where('sub_category_id', $subCategory->id)
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view($this->view . 'subCategory', compact(
            'path',
            'subCategory',
            'articles',
            'path'
        ));
    }
}

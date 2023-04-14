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

use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Comment;
use App\Models\checkIP;
use App\Models\Articles;
use App\Models\SubComment;
use App\Models\AdminDetails;

class ArticleController extends Controller
{
    protected $view  = 'pages.articles.';
    protected $path  = '/images/artikel/';

    public function index(Request $request, $slug)
    {
        $path = $this->path;

        // Check ip
        $ip = $request->ip();
        $this->storeip($slug, $ip);

        // Get data
        $article = Articles::with(['category', 'sub_category', 'user'])->where('title_slug', $slug)->first();
        $editor = AdminDetails::select('id', 'admin_id', 'nama')->where('admin_id', $article->editor_id)->first();

        // Get Comment
        $comment = Comment::where('article_id', $article->id)->get();
        $subComment = SubComment::where('article_id', $article->id)->get();
        $countComment = $comment->count() + $subComment->count();

        // Related article
        $relateds = Articles::with(['category', 'sub_category', 'user'])->where('sub_category_id', $article->sub_category_id)->where('status', 1)->whereNotIn('id', [$article->id])->inRandomOrder()->get()->take(5);

        return view($this->view . 'article', compact(
            'path',
            'article',
            'comment',
            'editor',
            'relateds',
            'countComment'
        ));
    }

    public function storeip($slug, $ip)
    {
        $article = Articles::where('title_slug', $slug)->first();
        $check = checkIP::select('article_id', 'ip')->where('article_id', $article->id)->where('ip', $ip)->get();

        if ($check->count() == 0) {
            // Counter Views
            DB::update('UPDATE articles SET views = views + 1 WHERE id = "' . $article->id . '"');
            // Save IP
            $checkIp = new checkIP();
            $checkIp->article_id = $article->id;
            $checkIp->ip = $ip;
            $checkIp->save();
        }
    }
}

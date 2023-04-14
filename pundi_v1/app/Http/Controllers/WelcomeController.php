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

// Models
use App\Models\Poster;
use App\Models\Articles;
use App\Models\Category;
use App\Models\HomePageTitle;

class WelcomeController extends Controller
{
    public function index()
    {
        // title slug
        // $slugs = Articles::get();
        // foreach ($slugs as $key => $i) {
        //     Articles::select('title_slug')->where('id', $i->id)->update([
        //         'title_slug' => str_slug($i->title)
        //     ]);
        // }

        // // name slug
        // $nameSlug = User::get();
        // foreach ($nameSlug as $key => $i) {
        //     User::select('name_slug')->where('id', $i->id)->update([
        //         'name_slug' => str_slug($i->name)
        //     ]);
        // }

        // *Title Card
        $titleCard = HomePageTitle::first();

        // *Section 1
        $trendingTop = Articles::with(['category', 'sub_category', 'user'])->wherestatus(1)->orderBy('created_at', 'desc')->take(5)->get();
        foreach ($trendingTop as $i) {
            $notIn[] = $i->id;
        }
        $trendingBottom = Articles::with(['category', 'sub_category', 'user'])->whereNotIn('id', $notIn)->wherestatus(1)->orderBy('created_at', 'desc')->take(3)->get();
        foreach ($trendingBottom as $i) {
            $notIn1[] = $i->id;
        }
        $data = array_merge($notIn, $notIn1);
        $trendingRight  = Articles::with(['category', 'sub_category', 'user'])->whereNotIn('id', $data)->wherestatus(1)->orderBy('created_at', 'desc')->take(5)->get();

        // *Section 2
        $card2 = Articles::with(['category', 'sub_category', 'user'])->whereNotIn('id', $data)->where('category_id', 4)->inRandomOrder()->wherestatus(1)->take(5)->get();

        // *Section 3

        // Article By Category
        $all = Articles::with(['category', 'sub_category', 'user'])->inRandomOrder()->orderBy('created_at', 'desc')->wherestatus(1)->take(6)->get();
        $n_category1 = Articles::with(['category', 'sub_category', 'user'])->where('category_id', 1)->wherestatus(1)->orderBy('created_at', 'desc')->take(4)->get();
        $n_category2 = Articles::with(['category', 'sub_category', 'user'])->where('category_id', 2)->wherestatus(1)->orderBy('created_at', 'desc')->take(4)->get();
        $n_category3 = Articles::with(['category', 'sub_category', 'user'])->where('category_id', 3)->wherestatus(1)->orderBy('created_at', 'desc')->take(4)->get();
        $n_category4 = Articles::with(['category', 'sub_category', 'user'])->where('category_id', 4)->wherestatus(1)->orderBy('created_at', 'desc')->take(4)->get();
        // Category
        $category1 = Category::whereid(1)->first();
        $category2 = Category::whereid(2)->first();
        $category3 = Category::whereid(3)->first();
        $category4 = Category::whereid(4)->first();
        // SideBar
        $sideBar = Articles::with(['category', 'sub_category', 'user'])->wherestatus(1)->inRandomOrder()->get()->take(4);
        $poster  = Poster::select('poster')->get();

        // *Section 4
        $card3 = Articles::with(['category', 'sub_category', 'user'])->whereNotIn('id', $data)->where('category_id', 1)->inRandomOrder()->wherestatus(1)->take(6)->get();

        // *Section 5
        $card4 = Articles::with(['category', 'sub_category', 'user'])->wherestatus(1)->orderBy('views', 'DESC')->take(5)->get();

        return view('home', compact(
            'trendingTop',
            'trendingBottom',
            'trendingRight',
            'card2',
            'all',
            'n_category1',
            'n_category2',
            'n_category3',
            'n_category4',
            'category1',
            'category2',
            'category3',
            'category4',
            'sideBar',
            'poster',
            'card3',
            'titleCard',
            'card4'
        ));
    }
}

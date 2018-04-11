<?php

namespace App\Http\Controllers;

use App\Category;
use App\ChildCate;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $htmlCate = "";
        $htmlNews = "";
        $htmltabNews = "";
        $htmltabMenu = "";
        //TODO group categories
        $cates = DB::table('categories')
            ->leftjoin('child_cates', 'categories.id', '=', 'child_cates.id')
            ->where('child_cates.lvl', 0)
            ->get();
        foreach ($cates as $cate) {
            if ($cate) {
                $htmlCate .= '<li class="nav__dropdown">';
                $htmlCate .= '<a href="#">' . $cate->name . '</a>';
                $childs = DB::table('categories')
                    ->leftjoin('child_cates', 'categories.id', '=', 'child_cates.id')
                    ->where('child_cates.lvl', $cate->id)
                    ->get();
                $htmlCate .= '<ul class="nav__dropdown-menu">';
                foreach ($childs as $child) {
                    if ($child) {
                        $htmlCate .= '<li><a href="#">' . $child->name . '</a></li>';
                    }
                }
                $htmlCate .= '</ul>';
                $htmlCate .= '</li>';
            }
        }
        //TODO group news
        $news = DB::table('news AS ne')
            ->leftjoin('categories AS cat', 'cat.id', '=', 'ne.Cate_id')
            ->select('cat.name', 'cat.alias AS cateSlug', 'ne.title', 'ne.alias', 'ne.summary', 'ne.description', 'ne.active', 'ne.images', 'ne.created_at')
            ->orderBy('ne.id', 'DESC')
            ->take(2)
            ->get();
        foreach ($news as $new) {
            if ($new->active == 1) {
                $htmlNews .= '<div class="col-md-6">';
                $htmlNews .= '<article class="entry">';
                $htmlNews .= '<div class="entry__img-holder">';
                $htmlNews .= '<a href="single-post.html">';
                $htmlNews .= '<div class="thumb-container thumb-75">';
                $htmlNews .= '<img data-src="' . asset('upload/thumbnail/' . $new->images) . '" src="' . asset('upload/thumbnail/' . $new->images) . '" class="entry__img lazyload" alt="" />';
                $htmlNews .= '</div>';
                $htmlNews .= '</a>';
                $htmlNews .= '</div>';
                $htmlNews .= '<div class="entry__body">';
                $htmlNews .= '<div class="entry__header">';
                $htmlNews .= '<a href="#" class="entry__meta-category">' . $new->name . '</a>';
                $htmlNews .= '<h2 class="entry__title">';
                $htmlNews .= '<a href="single-post.html">' . $new->title . '</a>';
                $htmlNews .= '</h2>';
                $htmlNews .= '<ul class="entry__meta">';
                $htmlNews .= '<li class="entry__meta-date">';
                $htmlNews .= '<i class="ui-date"></i>';
                $htmlNews .= date('d-m-Y', strtotime($new->created_at));
                $htmlNews .= '</li>';
                $htmlNews .= '</ul>';
                $htmlNews .= '</div>';
                $htmlNews .= '<div class="entry__excerpt">';
                $htmlNews .= '<p>' . truncateStringWords($new->summary, 180) . '</p>';
                $htmlNews .= '</div>';
                $htmlNews .= '</div>';
                $htmlNews .= '</article>';
                $htmlNews .= '</div>';
            }

        }
        //TODO group categories hot news and categories tab menu
        $getCate = DB::table('categories AS cate')
            ->leftjoin('child_cates AS chil', 'cate.id', '=', 'chil.cateParen_id')
            ->where('chil.lvl', '=', 0)
            ->select('cate.name', 'cate.alias', 'chil.cateParen_id AS cateP')
            ->orderBy('cate.id', 'DESC')
            ->get();
//        var_dump(count($getCate));die();
        foreach ($getCate as $cat) {
//            var_dump($cat->cateP);die();
            //TODO Tab Menu
            $htmltabMenu .= '<li class="tabs__item">';
            $htmltabMenu .= '<a href="#' . $cat->alias . '" class="tabs__trigger">' . $cat->name . '</a>';
            $htmltabMenu .= '</li>';
            //TODO aritcal
            $htmltabNews .= '<div class="tabs__content-pane" id="' . $cat->alias . '">';
            $htmltabNews .= '<div class="row">';
            $getCateAndNews= DB::table('categories AS cate')
                ->leftjoin('child_cates AS chil','cate.id','=','chil.cateParen_id')
                ->where('chil.lvl','=',$cat->cateP)
                ->select('cate.id','cate.name','cate.alias')
                ->get();
//            echo "<pre>";
//            var_dump($getCateAndNews);die();
//            echo "</pre>";
            foreach ($getCateAndNews as $new) {
                $getNews=DB::table('news AS n')
                    ->leftjoin('categories AS cate','n.Cate_id','=','cate.id')
                    ->where('n.Cate_id','=',$new->id)
                    ->orderBy('n.id', 'DESC')
                    ->take(2)
                    ->get();
//                echo "<pre>";
//                var_dump($getNews);die();
//                echo "</pre>";
                foreach ($getNews as $new){
                    if ($new->active == 1) {
                        $htmltabNews .= '<div class="col-md-6">';
                        $htmltabNews .= '<article class="entry">';
                        $htmltabNews .= '<div class="entry__img-holder">';
                        $htmltabNews .= '<a href="single-post.html">';
                        $htmltabNews .= '<div class="thumb-container thumb-75">';
                        $htmltabNews .= '<img data-src="' . asset('upload/thumbnail/' . $new->images) . '" src="' . asset('upload/thumbnail/' . $new->images) . '" class="entry__img lazyload" alt="" />';
                        $htmltabNews .= '</div>';
                        $htmltabNews .= '</a>';
                        $htmltabNews .= '</div>';
                        $htmltabNews .= '<div class="entry__body">';
                        $htmltabNews .= '<div class="entry__header">';
                        $htmltabNews .= '<a href="#" class="entry__meta-category">' . $new->name . '</a>';
                        $htmltabNews .= '<h2 class="entry__title">';
                        $htmltabNews .= '<a href="single-post.html">' . $new->title . '</a>';
                        $htmltabNews .= '</h2>';
                        $htmltabNews .= '<ul class="entry__meta">';
                        $htmltabNews .= '<li class="entry__meta-date">';
                        $htmltabNews .= '<i class="ui-date"></i>';
                        $htmltabNews .= date('d-m-Y', strtotime($new->created_at));
                        $htmltabNews .= '</li>';
                        $htmltabNews .= '</ul>';
                        $htmltabNews .= '</div>';
                        $htmltabNews .= '<div class="entry__excerpt">';
                        $htmltabNews .= '<p>' . truncateStringWords($new->summary, 180) . '</p>';
                        $htmltabNews .= '</div>';
                        $htmltabNews .= '</div>';
                        $htmltabNews .= '</article>';
                        $htmltabNews .= '</div>';
                    }
                }
            }
            $htmltabNews .= '</div>';
        }
        return view('workshop.index')->with(['cates' => $htmlCate, 'thisNews' => $htmlNews, 'tabNews' => $htmltabNews, 'tabMenu' => $htmltabMenu]);
    }
}

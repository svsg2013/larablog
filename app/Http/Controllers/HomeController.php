<?php

namespace App\Http\Controllers;
use App\Category;
use App\ChildCate;

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
        $htmlCate="";
        $cates= DB::table('categories')
            ->leftjoin('child_cates','categories.id','=','child_cates.id')
            ->where('child_cates.lvl',0)
            ->get();
        foreach($cates as $cate){
            $htmlCate .='<li class="nav__dropdown">';
            $htmlCate .='<a href="#">'.$cate->name.'</a>';
            $childs= DB::table('categories')
                ->leftjoin('child_cates','categories.id','=','child_cates.id')
                ->where('child_cates.lvl',$cate->id)
                ->get();
            $htmlCate .='<ul class="nav__dropdown-menu">';
                foreach ($childs as $child){
                    $htmlCate .='<li><a href="single-post-gallery.html">'.$child->name.'</a></li>';
                }
            $htmlCate .='</ul>';
            $htmlCate .='</li>';
        }
        return view('workshop')->with('cates',$htmlCate);
    }
}

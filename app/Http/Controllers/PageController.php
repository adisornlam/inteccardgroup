<?php

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // $about = Page::find(1)->long_desc;
        // $packages_title = Page::find(2)->long_desc;
        // $slides = PhotoSlide::where('active',1)->get();
        // $packages = Content::where('categories_id',2)->where('active',1)->get();
        // return view('pages.home',compact('about','packages_title','packages','slides'))->with('i');
        return view('pages.home');
    }

    public function show($slug)
    {
        $page = Page::where('slug',$slug)->where('active',1)->first();
        return view('pages.singlepage',compact('page'));
    }
}

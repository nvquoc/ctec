<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Slide;
use App\Menu;
use App\Page;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    function __construct()
    {
        view()->share('menus', Menu::where('parent_id', 0)->with('children')->orderBy('position', 'asc')->get());
        view()->share('slides', Slide::orderBy('id', 'asc')->get());
        view()->share('posts_hot', Post::where('is_hot', 1)->take('6')->orderBy('id', 'desc')->get());
        view()->share('site_title', Option::where('name', 'site_title')->first());
        view()->share('site_description', Option::where('name', 'site_description')->first());
        view()->share('site_footer', Option::where('name', 'site_footer')->first());
        view()->share('site_icon', Option::where('name', 'site_icon')->first());
        view()->share('site_logo', Option::where('name', 'site_logo')->first());
        view()->share('site_banner', Option::where('name', 'site_banner')->first());
    }
    function getTrangChu()
    {
        $cat_ttsk = Category::where('slug', 'tin-tuc-su-kien')->firstOrFail();
        $cat_tb = Category::where('slug', 'thong-bao')->firstOrFail();
        $cat_tts = Category::where('slug', 'tin-tuyen-sinh')->firstOrFail();
        return view('pages.index', compact('cat_ttsk', 'cat_tb', 'cat_tts'));
    }

    function getTrang($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->firstOrFail();

        return view('pages.page', compact('page'));
    }

    function getLoaiTin($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)->where('status', 1)->orderBy('id', 'desc')->paginate(10);

        return view('pages.category', compact('category', 'posts'));
    }

    function getBaiViet($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->firstOrFail();
        $posts_rl = Post::where('category_id', $post->category_id)->where('status', 1)->where('id', '!=',$post->id)->orderBy('id', 'desc')->take(6)->get();

        return view('pages.post', compact('post', 'posts_rl'));
    }
}

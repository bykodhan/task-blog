<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    
    //Anasayfayı göster
    public function index()
    {
        
        $categories = Post::select('category')->distinct()->get();
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('front.index', compact('categories', 'posts'));
    }
    public function post_show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $categories = DB::table('posts')
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        $posts = Post::orderBy('id', 'DESC')->take(4)->get();
        return view('front.post_show', compact('post', 'categories', 'posts'));
    }
}

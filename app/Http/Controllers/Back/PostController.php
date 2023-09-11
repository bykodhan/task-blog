<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    // Yazıları listele
    public function index()
    {
        if (request()->ajax()) {
            $users = Post::query()->where('user_id', Auth::id());
            return DataTables::of($users)->toJson();
        } else {
            return view('back.posts.index');
        }

    }
    public function edit($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        return view('back.posts.edit', compact('post'));
    }
    // Yazı oluşturma sayfasını göster
    public function create()
    {
        return view('back.posts.create');
    }

    // Yazı oluşturma işlemini yap
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|unique:posts',
            'category' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,webp,jpeg,jfif|max:2048',
            'content' => 'required',
        ], [
            'title.min' => __('Başlık alanı en az 3 karakterden oluşmalıdır.'),
            'title.min' => __('Başlık alanı en az 3 karakterden oluşmalıdır.'),
            'title.required' => __('Başlık alanı boş bırakılamaz.'),
            'title.unique' => __('Bu başlık daha önce kullanılmış.'),
            'category.required' => __('Kategori alanı boş bırakılamaz.'),
            'img.required' => __('Görsel alanı boş bırakılamaz.'),
            'img.image' => __('Görsel alanı resim dosyası olmalıdır.'),
            'img.mimes' => __('Görsel alanı jpeg,png,jpg uzantılı olmalıdır.'),
            'img.max' => __('Görsel alanı maksimum 2MB olmalıdır.'),
            'content.required' => __('İçerik alanı boş bırakılamaz.'),
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->category = $request->category;
        // Görsel yükleme

        if ($request->hasFile('img')) {
            $image = $request->file('img');

            $imageName = time() . '.' . $image->extension();
            $path = public_path('uploads/posts'); // public içerisinde uploads/posts klasörüne kaydet

            $image->move($path, $imageName);

            $post->img = 'uploads/posts/' . $imageName;
        }

        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

    }
    // Yazı oluşturma işlemini yap
    public function update(Request $request)
    {
        $post = Post::where('id', $request->id)->where('user_id', Auth::id())->firstOrFail();
        $post->title = $request->title;
        $post->category = $request->category;
        // Görsel yükleme
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            $imageName = time() . '.' . $image->extension();
            $path = public_path('uploads/posts'); // public içerisinde uploads/posts klasörüne kaydet

            $image->move($path, $imageName);

            $post->img = 'uploads/posts/' . $imageName;
        }
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

        return ['img' => asset($post->img)];

    }
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if ($post->img) {
           File::delete($post->img);
        }
        $post->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::where('active', true)->where('published_at', '<', Carbon::now())->with('user')->orderBy('published_at', 'desc')->get();
        return view('news.index', [
            'news' => $news
        ]);
    }


    public function author(Request $request)
    {

        $author = urldecode($request->author);
        $news = Post::where('active', true)
        ->where('published_at', '<', Carbon::now())
        ->whereHas('user', function ($query) use ($author) {
            $query->where('name', $author);
        })
        ->with('user')
        ->orderBy('published_at', 'desc')
        ->get();

        return view('news.index', [
            'news' => $news
        ]);
    }

    public function show(Request $request)
    {
        $post = Post::where('active', true)
        ->where('published_at', '<', Carbon::now())
        ->where('slug', $request->slug)
        ->with('user')
        ->first();


        $similar = Post::where('active', true)
        ->where('published_at', '<', Carbon::now())
        ->where('id', '!=', $post->id)
        ->with('user')
        ->limit(5)
        ->orderBy('published_at', 'DESC')
        ->get();

        return view('news.show', [
            'post' => $post,
            'similar' => $similar

        ]);
    }
}

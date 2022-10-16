<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class BizNewsController extends Controller
{
    public function index(){
        // $allNews = News::all();
        $allNews = News::latest()->get();
        return view('allNews.news', compact('allNews'));
    }
    public function create(){
        return view('allNews.add-news');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'highlight' => 'required',
            'body' => 'required'
        ]);
        
        $title = $request->input('title');
        $slugId = News::latest()->take(1)->first()->id + 1;
        $slug = Str::slug($title, '-') . '-' . $slugId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');
        $highlight = $request->input('highlight');
        $imagePath = 'storage/' . $request->file('image')->store('imgs', 'public'); //i.e 'storage/'. imgs/aC6D6MHT66S8m5cgmefeukueo8W5fYStDq0fKC7b.jpg
        
        $news = new News();
        $news->title = $title;
        $news->slug = $slug;
        $news->user_id = $user_id;
        $news->body = $body;
        $news->highlight = $highlight;
        $news->imagePath = $imagePath;

        $news->save();

        return redirect()->back()->with('status', 'Review Added successfully');
    }
    /*
    *
    public function show($slug){
        $newsItem = News::where('slug', $slug)->first();
        return view('allNews.selected-news', compact('newsItem'));
    }
    *
    */

    public function show(News $newsItem){
        return view('allNews.selected-news', compact('newsItem'));
    }
}

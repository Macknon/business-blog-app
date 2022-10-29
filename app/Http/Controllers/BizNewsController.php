<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Category;

class BizNewsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    } 

    public function index(Request $request){
        if ($request->search) {
            # code...
            $allNews = News::where("title", "like", "%". $request->search. "%")
            ->orWhere("body", "like", "%". $request->search. "%")
            ->latest()->paginate(4);
        }else {
            # $allNews = News::all();
        $allNews = News::latest()->paginate(4);;
        }

        $categories = Category::all();
        
        return view('allNews.news', compact('allNews', 'categories'));
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
        // $slugId = 1;
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

    public function edit(News $newsItem){
        if (auth()->user()->id !== $newsItem->user->id) {
            # code...
            abort(403);
        }
        return view('allNews.edit-news', compact('newsItem'));
    }

    public function update(Request $request, News $newsItem){
        if (auth()->user()->id !== $newsItem->user->id) {
            # code...
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'highlight' => 'required',
            'body' => 'required'
        ]);
        
        $title = $request->input('title');
        $slugId = $newsItem->id;
        $slug = Str::slug($title, '-') . '-' . $slugId;
        $body = $request->input('body');
        $highlight = $request->input('highlight');
        $imagePath = 'storage/' . $request->file('image')->store('imgs', 'public'); //i.e 'storage/'. imgs/aC6D6MHT66S8m5cgmefeukueo8W5fYStDq0fKC7b.jpg
        
        $news = News::find($slugId);

        $news->title = $title;
        $news->slug = $slug;
        $news->body = $body;
        $news->highlight = $highlight;
        $news->imagePath = $imagePath;

        $news->save();

        return redirect()->back()->with('status', 'The Review has been Updated!');
    }

    /*
    public function show($slug){
        $newsItem = News::where('slug', $slug)->first();
        return view('allNews.selected-news', compact('newsItem'));
    }
    */

    public function show(News $newsItem){
        return view('allNews.selected-news', compact('newsItem'));
    }

    public function destroy(News $newsItem){
        $newsItem->delete();
        return redirect()->back()->with('status', 'Your Review has been Removed!');
    }
}

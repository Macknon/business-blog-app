<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BizNewsController extends Controller
{
    public function index(){
        return view('allNews.news');
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
        dd('val P put I');
        $title = $request->input('title');
        $slug = Str::slug($title, '-');
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        $request->file('image')->store('imgs', 'public');
        dd($title);
    }
    public function show(){
        return view('allNews.selected-news');
    }
}

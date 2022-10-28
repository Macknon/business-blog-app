<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allNews = News::latest()->take(4)->get();
        return view('home', compact('allNews'));
    }
}

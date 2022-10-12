<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BizNewsController extends Controller
{
    public function index(){
        return view('news');
    }
    public function show(){
        return view('selected-news');
    }
}

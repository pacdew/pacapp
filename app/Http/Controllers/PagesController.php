<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcom To Laravel!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About pacapp';
        return view('pages.about')->with('title', $title);
    }
    public function tests(){
        $title = 'Tests';
        return view('pages.tests')->with('title', $title);
    }
    public function posts(){
        $title = 'Posts';
        return view('pages.posts')->with('title', $title);
    }
}

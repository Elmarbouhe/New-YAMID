<?php

namespace App\Http\Controllers;
use App\Models\post;


class HomeController extends Controller
{
    public function index()
    {
        $post = post::latest()->paginate(6);
        return view('home')->with([
            'posts' => $post ,
        ]);
    }
}

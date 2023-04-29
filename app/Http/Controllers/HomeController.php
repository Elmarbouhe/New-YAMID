<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;


class HomeController extends Controller
{
    /**
     * show all posts
     *
     * @return void
     */
    public function index()
    {
        $post = post::latest()->paginate(6);
        return view('home')->with([
            'posts' => $post ,
            'categories' => Category::has('posts')->get(),
        ]);


    }

    /**
     * show post by category
     *
     * @param [type] $id
     * @return void
     */
    public function showByCategory(Category $category){
        $post = $category->posts()->latest()->paginate(6);
        return view('home')->with([
            'posts' => $post ,
            'categories' => Category::has('posts')->get(),
        ]);


    }




}

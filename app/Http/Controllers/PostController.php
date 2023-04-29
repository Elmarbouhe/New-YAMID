<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\post;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use PhpParser\Node\Stmt\Catch_;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->has('image')){
            $file = $request->image;
            $image_name = time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);

        }
        else{
            $image_name = "https://cdn.pixabay.com/photo/2016/12/05/19/43/pill-1884775_960_720.jpg";
        }
        post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $image_name ,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'inStock' => $request->inStock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('home')->with([
            'success' => 'article ajouté avec succès'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
        return view('show')->with([
            'post' => $post ,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post,)
    {
        //
        return view('edit')->with([
            'post' => $post ,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $slug)
    {
            //
        $post = post::where('slug', $slug)->first();
        if($request->has('image')){
            $file = $request->image;
            $image_name = time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads/'.$post->image));
            $post->image = $image_name;
        }
        else{
            $post->image = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $post->image,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'inStock' => $request->inStock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('home')->with([
            'success' => 'article modifié avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
        if(file_exists(public_path('uploads/'.$post->image))){
            unlink(public_path('uploads/'.$post->image));
        }
        $post->delete();
        return redirect()->route('home')->with([
            'success' => 'article supprimé avec succès'
        ]);
    }
}

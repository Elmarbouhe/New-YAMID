<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\post;
use App\Http\Requests\PostRequest;


class HomeController extends Controller
{
    public function index()
    {
        $post = post::latest()->paginate(6);
        return view('home')->with([
            'posts' => $post ,
        ]);
    }

    public function show($slug)
    {
        $post = post::where('slug', $slug)->firstOrFail();
        return view('show')->with([
            'post' => $post ,
        ]);
    }

    public function create(){
        return view('create');
    }


    public function edit($slug)
    {
        $post = post::where('slug', $slug)->firstOrFail();
        return view('edit')->with([
            'post' => $post ,
        ]);
    }

    public function store(PostRequest $request)
    {
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


        ]);

        return redirect()->route('home')->with([
            'success' => 'article ajouté avec succès'
        ]);


    }

    public function update(PostRequest $request, $slug)
    {
        $post = post::where('slug', $slug)->first();
        if($request->has('image')){
            $file = $request->image;
            $image_name = time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads/'.$post->image));
            $post->image = $image_name;
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'image' => $post->image,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home')->with([
            'success' => 'article modifié avec succès'
        ]);
    }


    public function delete($slug)
    {
        $post = post::where('slug', $slug)->first();
        unlink(public_path('uploads/'.$post->image));
        $post->delete();
        return redirect()->route('home')->with([
            'success' => 'article supprimé avec succès'
        ]);
    }

}

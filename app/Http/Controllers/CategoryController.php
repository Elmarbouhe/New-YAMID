<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use COM;

use function PHPSTORM_META\argumentsSet;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('home')->with([
            'success' => 'category ajouté avec succès'
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $category = Category::find($category->id);
        return view('create')->with([
            'category' => $category ,
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('editCategory')->with([
            'category' => $category ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(CategoryRequest $request, Category $category)
    // {
    //     //
    //     $category->update([
    //         'title' => $request->title,
    //     ]);

    //     return redirect()->route('home')->with([
    //         'success' => 'article update avec succès'
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        return redirect()->route('home')->with([
            'success' => 'caregory supprimé avec succès'
        ]);

    }
}

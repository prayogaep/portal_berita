<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::with('posts')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/categories';
            $file->move($destinationPath, $fileName);
            $validatedData['file_upload'] = $fileName;
        }
        Category::create($validatedData);
        Alert::success('Success', 'Category has been added!');
        return redirect('/dashboard/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $category = Category::where('id',$category->id)->first();

        $rules = [
            'name' => 'required|max:255'
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }
        if ($request->file('file_upload')) {
            $rules['file_upload'] = 'required|mimes:jpg,png,jpeg';
        }
        $validatedData = $request->validate($rules);
        // dd($category);
        if ($request->file('file_upload')) {
            if ($category->file_upload != null) {
                unlink(public_path("categories/" . $category->file_upload));
            }
            $file = $request->file('file_upload');
            $fileName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '_', $fileName);
            $destinationPath = public_path() . '/categories';
            $file->move($destinationPath, $fileName);
            $validatedData['file_upload'] = $fileName;
            $category->file_upload = $validatedData['file_upload'];
        }
        $category->name = $validatedData['name'];
        if ($request->slug != $category->slug) {
            $category->slug = $validatedData['slug'];
        }
        $category->update();
        Alert::success('Success', 'Category has been updated!');
        return redirect('/dashboard/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->file_upload != null) {
            unlink(public_path("categories/" . $category->file_upload));
        }
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }
}

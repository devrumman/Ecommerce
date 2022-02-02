<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use File;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.pages.categories.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_category = Category::orderBy('name', 'asc')->where('parent_id', 0)->get();
        return view('backend.pages.categories.create', compact('primary_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => 'Please Provide Category Name'
        ]);

        $category = new Category();

        $category->name       = $request->name;
        $category->desc       = $request->desc;
        $category->image      = $request->image;
        $category->parent_id  = $request->parent_id;

        if ($request->image)
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }

        $category->save();
        return redirect()->route('category.manage')->with('success','New category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $primary_category = Category::orderBy('name', 'asc')->where('parent_id', 0)->get();
        $category = Category::find($id);

        if(!is_null($category)){
            return view('backend.pages.categories.edit', compact('category', 'primary_category'));
        }
        else{
            return redirect()->route('category.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => 'Please Provide Category Name'
        ]);
        
        $category = Category::find($id);
        $category->name       = $request->name;
        $category->desc       = $request->desc;
        $category->parent_id  = $request->parent_id;

        if (!empty($request->image)) 
        {
           if (File::exists('backend/img/categories/' . $category->image)){
               File::delete('backend/img/categories/' . $category->image);  
           }
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img; 
        }

        $category->save();
        return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (File::exists('backend/img/categories/' . $category->image))
           {
              File::delete('backend/img/categories/' . $category->image);  
           }
           
           $category->delete();
           return redirect()->route('category.manage');
    }
}

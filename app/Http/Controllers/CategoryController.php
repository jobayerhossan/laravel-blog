<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\flash;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('created_at', 'DESC')->paginate(20);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'name' => 'required|unique:categories,name'
        ));

        $category = Category::create(array(
            'name' => $request->name, 
            'slug' => Str::slug($request->name, '-'), 
            'description' => $request->description
        ));

        Session::flash('success', 'Category Created Successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validation
        $this->validate($request, [
            'name' => "required|unique:categories,name,$category->id",
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->save();

        Session::flash('success', 'Category Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();

            Session::flash('success', 'Category deleted successfully');
            return redirect()->route('category.index');
        }
    }
}

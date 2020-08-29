<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('created_at','DESC')->paginate(20);
        return view('admin.category.index',compact('categories'));
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

        $category= new Category();
        //Validation

        $this->validate($request,[
            'name'=>'required|unique:categories,name',
        ]);

        
            $category->name=$request->input('name');
            $category->slug=Str::slug($request->name, '-');

            $category->description=$request->input('description');
            
            
        
         $category->save();

         Toastr::success('Category Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Validation

        $this->validate($request,[
            'name'=>'required',
        ]);

        
            $category->name=$request->input('name');
            $category->slug=Str::slug($request->name, '-');

            $category->description=$request->input('description');
            
            
        
         $category->save();

         Toastr::success('Category Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('category.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();


         Toastr::success('Category Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('category.index');

        }
    }
}

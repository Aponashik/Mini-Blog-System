<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::orderBy('created_at','DESC')->paginate(20);
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags=new Tag();

        $this->validate($request,[
            'name'=>'required|unique:tags,name'
        ]);

        $tags->name=$request->input('name');
        $tags->slug=Str::slug($request->name,'_');
        $tags->description=$request->input('description');

        $tags->save();
        Toastr::success('Tag Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        $this->validate($request,[
            'name'=>'required'
        ]);

        $tag->name=$request->input('name');
        $tag->slug=Str::slug($request->name,'_');
        $tag->description=$request->input('description');

        $tag->save();
        Toastr::success('Tag Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag){
            $tag->delete();


         Toastr::success('Tag Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('tag.index');

        }
    }
}

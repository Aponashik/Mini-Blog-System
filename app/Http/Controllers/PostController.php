<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $posts=Post::orderBy('created_at','DESC')->paginate(10);
        return view('admin.post.index',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        $categories=Category::all();
       return view('admin.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'title'=>'required|unique:posts,title',
            'image'=>'required|image',
            'category'=>'required',
            'description'=>'required'
        ]);

        

        $post=Post::create([

            'title'=>$request->title,
            'image'=>'image.jpg',
            'slug'=>Str::slug($request->title,'_'),
            'description'=>$request->description,
            'category_id'=>$request->category,
            'user_id'=>auth()->user()->id,
            'published_at'=>Carbon::now(),


        ]);

        //...multiple tags store korar jnno attach() method use kora hoyece...//
        $post->tags()->attach($request->tags);

        if($request->has('image')){
            $image=$request->image;
            $image_new_name=time(). '.' .$image->getClientOriginalExtension();
            $image->move('Post_Image',$image_new_name);
            $post->image=$image_new_name;
            $post->save();
        }

        Toastr::success('Post Created Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=Tag::all();
        $categories=Category::all();
        return view('admin.post.edit',compact('categories','post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


        $this->validate($request,[

            'title'=>'required',
            //'image'=>'required',
            
            'category'=>'required',
            'description'=>'required'
        ]);

        

            $post->title=$request->title;
            $post->slug=Str::slug($request->title,'_');
            $post->description=$request->description;
            $post->category_id=$request->category;
            
            //...update er somoy attach() error hobe sei jnno sync use korte hobe...//
            $post->tags()->sync($request->tags);

         if($request->hasFile('image')){
            $image=$request->image;
            $image_new_name=time(). '.' .$image->getClientOriginalExtension();
            unlink('Post_Image/'.$post->image);
            $image->move('Post_Image',$image_new_name);
            $post->image=$image_new_name;
            
        }
        $post->save();

        Toastr::success('Post Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('post.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(file_exists('Post_Image/'.$post->image)){
            unlink('Post_Image/'.$post->image);
        }
        $post->delete();

        Toastr::success('Post Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('post.index');
    }
}

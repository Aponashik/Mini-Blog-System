<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use App\Setting;
use App\Contact;


class FrontEndController extends Controller
{
	public function home(){

		$posts=Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();

		$firstPosts2=$posts->splice(0,2);
		$middlePost=$posts->splice(0,1);
		$lastPosts2=$posts->splice(0,2);

		$footerPosts=Post::with('category','user')->inRandomOrder()->limit(4)->get();
		$firstFooterPost = $footerPosts->splice(0, 1);
        $firstfooterPosts2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);
		

		$recentPosts=Post::with('category','user')->orderBy('created_at','DESC')->paginate(6);
		return view('website.home',compact('posts','recentPosts','firstPosts2','middlePost','lastPosts2','firstFooterPost','firstfooterPosts2','lastFooterPost'));

	}

	public function about(){

		$user=auth()->user();
		$setting=Setting::first();
		return view('website.about',compact('setting','user'));
	}
	public function category($slug){
		$category=Category::where('slug',$slug)->first();

		if($category){
			$posts=Post::where('category_id',$category->id)->paginate(6);
			return view('website.category',compact('category','posts'));

		}
		else{
			return redirect()->route('website');
		}
		
	}
	
	public function post($slug){

		$post=Post::with('category','user')->where('slug',$slug)->first();
		$popularPosts=Post::with('category','user')->inRandomOrder()->limit(3)->get();

		$categories=Category::with('posts')->get();
		$tags=Tag::all();

		//More ReletedPosts//

		$reletedPosts=Post::orderBy('category_id','desc')->inRandomOrder()->limit(4)->get();
		$firstReletedPost = $reletedPosts->splice(0, 1);
        $firstReletedPosts2 = $reletedPosts->splice(0, 2);
        $lastReletedPost = $reletedPosts->splice(0, 1);

		if($post){
			return view('website.post',compact('post','popularPosts','categories','tags','firstReletedPost','firstReletedPosts2','lastReletedPost'));
		} else{
			redirect('/');
		}
	}

	public function contact(){
		return view('website.contact');
	}

	public function send_message( Request $request){
		$this->validate($request,[

			'name'=>'required|max:200',
			'email'=>'required|email',
			'message'=>'required|min:50',
		]);

		$contact=Contact::create($request->all());
         return redirect()->back()->with('message', 'Message Send Successfully.We Will Contact You Asap!');

	}
}

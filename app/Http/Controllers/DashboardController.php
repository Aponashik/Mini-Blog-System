<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Contact;

class DashboardController extends Controller
{
    public function index(){

    	$user=auth()->user();
    	$posts=Post::orderBy('created_at','DESC')->take(5)->get();
    	$postscount=Post::all();
    	$userscount=User::all();
    	$categoriescount=Category::all();
    	$messagescount=Contact::all();
    	return view('admin.dashboard.index',compact('user','posts','postscount','userscount','categoriescount','messagescount'));
    }
}

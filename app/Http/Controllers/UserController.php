<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
    	$users=User::latest()->paginate(10);

    	return view('admin.user.index',compact('users'));
    }

    public function create(){
    	return view('admin.user.create');
    }

    public function store(Request $request){

        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image'=> 'sometimes|nullable|image|max:5048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/user/', $image_new_name);
            $user->image = '/storage/user/' . $image_new_name;
            
        }
        $user->save();
    	 Toastr::success('User Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->route('user.index');

    }

    public function edit(User $user){
    	$user=auth()->user();

    	return view('admin.user.edit',compact('user'));
    }



    public function profile(){

        $user=auth()->user();

        return view('admin.user.profile',compact('user'));
    }

    public function profile_update(Request $request){

        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
            'image'=> 'sometimes|nullable|image|max:5048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/user/', $image_new_name);
            $user->image = '/storage/user/' . $image_new_name;
        }
        

            $user->save();

	        Toastr::success('User Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);

	          return redirect()->back();


    }

    

public function update(Request $request, User $user){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();

        
        return redirect()->back();
    }


    // public function destroy(User $user)
    // {
    
    //     $user=User::find($id);
    //     if(file_exists( '/storage/user/' . $user->image)){
    //         unlink('/storage/user/'.$user->image);
    //     }
    //     $user->delete();



    //     Toastr::success('User Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);

    //      return redirect()->route('user.index');
    // }

     public function destroy(User $user){
        if($user){
            $user->delete();
            
        }
        Toastr::success('User Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);

     return redirect()->route('user.index');
    }
        
}
    


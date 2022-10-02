<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use pubilc_path;
use Hash;

class ProfileController extends Controller
{
    public function view(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('backend.user.view_profile', compact('user'));
    }

    public function edit($id){
    	$edit_data = User::find($id);
    	return view('backend.user.edit_profile', compact('edit_data'));
    }

    public function update(Request $request, $id){
    	$data = User::find($id);
    	$requested_data = $request->all();
    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$file_name = date('YmdHi'). $file->getClientOriginalName();
    		$upload_path = 'public/BackEnd/uploads/users_images/';
    		@unlink($upload_path.$data->image);

    		$file->move($upload_path, $file_name);
    		$requested_data['image'] = $file_name;
    	}

		dd($request->file('image'));

    	$data->fill($requested_data)->save();
    	return redirect()->route('profile.view')->with('success', 'Profile Edited Successfully');
    	
    }

    public function password_view(){
    	return view('backend.user.view_password');
    }

    public function password_update(Request $request){
    	$this->validate($request, [
    		'current_password' => 'required',
    		'password' => 'required|confirmed'
    	]);

    	$hashed_password = Auth::user()->password;

    	if (Hash::check($request->current_password, $hashed_password)) {		
    		$data = User::find(Auth::id());
    		$data->password = Hash::make($request->password);
    		$data->save();
    		return redirect()->route('password.view')->with('success', 'Password Change Successfully');
    	} 

    return redirect()->route('password.view')->with('success', 'Please, Check Your Old Password');
    	
    }
}

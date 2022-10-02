<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function view(){

    	$data['all_data'] = User::all();
    	return view('backend.user.view_users', $data);
    }

    public function add(){
    	return view('backend.user.add_user');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|unique:users,email'
    	]);

    	$data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->user_type = $request->user_type;
        $data->password = Hash::make($request->password);
    	$data->save();
    	return redirect()->route('users.view')->with('success', 'Data Inserted Successfully');;
    }

    public function edit($id){
    	$edit_user = User::find($id);
    	return view('backend.user.edit_user', compact('edit_user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);

        $data = User::find($id);
        $requested_data = $request->all();
        $data->fill($requested_data)->save();
        return redirect()->route('users.view')->with('success', 'Data Updated Successfully');

        // if ($success) {
        //     $notification = array(
        //         'message' => 'Successfully Member Updated',
        //         'alert' => 'Success'
        //     );
        // }
        // return redirect()->route('users.view')->with($notification);
    }

    public function delete($id){
        $data = User::find($id);
        if (file_exists('public/Backend/uploads/users_images/'. $data->image) AND ! empty($data->image)) {
            unlink('public/Backend/uploads/users_images/'. $data->image);
        }
        $data->delete();
        return redirect()->route('users.view')->with('success', 'Data Deleted Successfully');
    }
}

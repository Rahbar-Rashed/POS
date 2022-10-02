<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
    	$all_category = Category::all();
    	return view('backend.category.view_category', compact('all_category'));
    }

    public function add(){
    	return view('backend.category.add_category');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required'    		
    	]);

    	$data = new Category();
    	$request_data = $request->all();
    	$request_data['created_by'] = Auth::user()->id;
    	$request_data['updated_by'] = Auth::user()->id;
    	$data->fill($request_data)->save();
    	return redirect()->route('category.view')->with('success', 'Category Added Successfully');
    }

    public function edit($id){
    	
    	$category_data = Category::find($id);
    	return view('backend.category.edit_category',compact('category_data'));
    }

    public function update(Request $request, $id){
    	$edit_unit = Category::find($id);
    	$request_data = $request->all();    	
    	$request_data['updated_by'] = Auth::user()->id;
    	$edit_unit->fill($request_data)->save();
    	return redirect()->route('category.view')->with('success', 'Category Edited Successfully');
    }

    public function delete($id){
    	$delete_category = Category::find($id);
    	$delete_category->delete();
    	return redirect()->route('category.view')->with('success', 'Category Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Unit;
use Auth;

class UnitController extends Controller
{
    public function view(){
    	$all_unit = Unit::all();
    	return view('backend.unit.view_unit', compact('all_unit'));
    }

    public function add(){
    	return view('backend.unit.add_unit');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required'    		
    	]);

    	$data = new Unit();
    	$request_data = $request->all();
    	$request_data['created_by'] = Auth::user()->id;
    	$request_data['updated_by'] = Auth::user()->id;
    	$data->fill($request_data)->save();
    	return redirect()->route('units.view')->with('success', 'Unit Added Successfully');
    }

    public function edit($id){
    	
    	$unit_data = Unit::find($id);
    	return view('backend.unit.edit_unit',compact('unit_data'));
    }

    public function update(Request $request, $id){
    	$edit_unit = Unit::find($id);
    	$request_data = $request->all();    	
    	$request_data['updated_by'] = Auth::user()->id;
    	$edit_unit->fill($request_data)->save();
    	return redirect()->route('units.view')->with('success', 'Unit Edited Successfully');
    }

    public function delete($id){
    	$delete_unit = Unit::find($id);
    	$delete_unit->delete();
    	return redirect()->route('units.view')->with('success', 'Unit Deleted Successfully');
    }
}

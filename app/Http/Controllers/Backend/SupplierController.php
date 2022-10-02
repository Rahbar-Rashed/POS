<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SupplierController extends Controller
{
    public function view(){
    	$all_suppliers = Supplier::all();
    	return view('backend.supplier.view_supplier', compact('all_suppliers'));
    }

    public function add(){
    	return view('backend.supplier.add_supplier');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'mobile_no' => 'required',
    		'address' => 'required'
    	]);

    	$data = new Supplier();
    	$request_data = $request->all();
    	$request_data['created_by'] = Auth::user()->id;
    	$request_data['updated_by'] = Auth::user()->id;
    	$data->fill($request_data)->save();
    	return redirect()->route('suppliers.view')->with('success', 'Supplier Added Successfully');
    }

    public function edit($id){
    	
    	$suppliers_data = Supplier::find($id);
    	return view('backend.supplier.edit_supplier',compact('suppliers_data'));
    }

    public function update(Request $request, $id){
    	$edit_supplier = Supplier::find($id);
    	$request_data = $request->all();    	
    	$request_data['updated_by'] = Auth::user()->id;
    	$edit_supplier->fill($request_data)->save();
    	return redirect()->route('suppliers.view')->with('success', 'Supplier Edited Successfully');
    }

    public function delete($id){
    	$delete_supplier = Supplier::find($id);
    	$delete_supplier->delete();
    	return redirect()->route('suppliers.view')->with('success', 'Supplier Deleted Successfully');
    }
}

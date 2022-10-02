<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use Auth;

class CustomerController extends Controller
{
    public function view(){
    	$all_customer = Customer::all();
    	return view('backend.customer.view_customers', compact('all_customer'));
    }

    public function add(){
    	return view('backend.customer.add_customer');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'mobile_no' => 'required',
    		'address' => 'required'
    	]);

    	$data = new Customer();
    	$request_data = $request->all();
    	$request_data['created_by'] = Auth::user()->id;
    	$request_data['updated_by'] = Auth::user()->id;
    	$data->fill($request_data)->save();
    	return redirect()->route('customer.view')->with('success', 'Customer Added Successfully');
    }

    public function edit($id){
    	
    	$customer_data = Customer::find($id);
    	return view('backend.customer.edit_customer',compact('customer_data'));
    }

    public function update(Request $request, $id){
    	$edit_customer = Customer::find($id);
    	$request_data = $request->all();    	
    	$request_data['updated_by'] = Auth::user()->id;
    	$edit_customer->fill($request_data)->save();
    	return redirect()->route('customer.view')->with('success', 'Customer Edited Successfully');
    }

    public function delete($id){
    	$delete_customer = Customer::find($id);
    	$delete_customer->delete();
    	return redirect()->route('customer.view')->with('success', 'Customer Deleted Successfully');
    }
}

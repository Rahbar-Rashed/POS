<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;

class ProductController extends Controller
{
    public function view(){
    	$all_product = Product::all();
    	return view('backend.product.view_product', compact('all_product'));
    }

    public function add(){
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
    	return view('backend.product.add_product',compact('suppliers','categories','units'));
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',	
    	]);


    	$data = new Product();
    	$request_data = $request->all();
    	$request_data['created_by'] = Auth::user()->id;
    	$request_data['updated_by'] = Auth::user()->id;
    	$data->fill($request_data)->save();
    	return redirect()->route('product.view')->with('success', 'Product Added Successfully');
    }

    public function edit($id){

    	$suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
    	$product_data = Product::find($id);
    	return view('backend.product.edit_product',compact('product_data','suppliers','categories','units'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',    
        ]);

    	$edit_unit = Product::find($id);
    	$request_data = $request->all();    	
    	$request_data['updated_by'] = Auth::user()->id;
    	$edit_unit->fill($request_data)->save();
    	return redirect()->route('product.view')->with('success', 'Product Edited Successfully');
    }

    public function delete($id){
    	$delete_product = Product::find($id);
    	$delete_product->delete();
    	return redirect()->route('product.view')->with('success', 'Product Deleted Successfully');
    }
}

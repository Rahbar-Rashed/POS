<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use App\Model\Purchase;
use Auth;


class PurchaseController extends Controller
{
    public function view(){
    	$all_purchase = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
    	return view('backend.purchase.view_purchase', compact('all_purchase'));
    }

    public function add(){
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
    	
        return view('backend.purchase.add_purchase',compact('suppliers','categories','units'));
    }

    public function store(Request $request){
    	if ($request->category_id == null) {

    		return redirect()->back()->with('error','Sorry! you do not select any item');
    	} else{
    		$count_category = count($request->category_id);

    		for ($i=0; $i < $count_category ; $i++) { 
    			$purchase = new Purchase();
    			$purchase->date = date('Y-m-d', strtotime($request->date[$i]));
    			$purchase->purchase_no = $request->purchase_no[$i];
    			$purchase->supplier_id = $request->supplier_id[$i];
    			$purchase->category_id = $request->category_id[$i];
    			$purchase->product_id = $request->product_id[$i];
    			$purchase->buying_qty = $request->buying_qty[$i];
    			$purchase->unit_price = $request->unit_price[$i];
    			$purchase->buying_price = $request->buying_price[$i];
    			$purchase->description = $request->description[$i];
    			$purchase->created_by = Auth::user()->id;
    			$purchase->status = '0';
    			$purchase->save();
    		}
    	}

    	return redirect()->route('purchase.add')->with('success', 'Products Purchase Successfully.');
    }   

    public function pending(){
    	$all_purchase_pending = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
    	return view('backend.purchase.pending_purchase', compact('all_purchase_pending'));
    }

    public function approve($id){
    	$purchase_data = Purchase::find($id);    	
    	$product_data = Product::where('id', $purchase_data->product_id)->first();
    	//$total_quantity = (($product_quantity_purchase) + ($product_quantity));
    	// echo $product_quantity->quantity;
    	$purchase_qty = ((float)($purchase_data->buying_qty)) + ((float)($product_data->quantity));
    	$product_data->quantity = $purchase_qty;
    	if ($product_data->save()) {
    		$purchase_data->status = '1';
    	$purchase_data->save();
    	return redirect()->route('purchase.pending')->with('success', 'Purchase Approved Successfully');
    	};	


    }
    
    public function delete($id){
    	$delete_purchase = Purchase::find($id);
    	$delete_purchase->delete();
    	return redirect()->route('purchase.view')->with('success', 'Purchase Deleted Successfully');
    }
}

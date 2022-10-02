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

class DefaultController extends Controller
{
    public function get_category(Request $request){
    	$supplier_id = $request->supplier_id;
    	$all_data = Product::with(['category'])->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();

    	return response()->json($all_data);

    }

    public function get_product(Request $request){
    	$category_id = $request->category_id;
    	$all_product = Product::where('category_id', $category_id)->get();    	
    	return response()->json($all_product);
    }

    public function get_current_stock(Request $request){
        $stock = Product::where('id', $request->product_id)->first()->quantity;

        return response()->json($stock);
    }
}

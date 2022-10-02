<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use App\Model\Purchase;
use App\Model\Invoice;
use Auth;
use App\Model\InvoiceDetails;
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;
use DB;
class InvoiceController extends Controller
{
    
    	public function view(){
    	$all_invoice = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status', '1')->get();
    	return view('backend.invoice.view_invoice', compact('all_invoice'));
    }

    public function add(){
        $categories = Category::all();
        $customers = Customer::all();
        $date = date('Y-m-d');        
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if ($invoice_data == null) {
            $invoice_count = 1;
        } else {
            $invoice_count = $invoice_data->invoice_no;
            $invoice_count += 1;
        }
    	return view('backend.invoice.add_invoice',compact('categories','invoice_count','customers','date'));
    }

    public function store(Request $request){

    	if ($request->category_id == null) {
    		return redirect()->back()->with('error','Sorry! you do not select any item');
    	} 
        else {
            if ($request->paid_amount > $request->estimated_amount) {
                return redirect()->back()->with('error','Sorry! Paid Amount large to Total Amount');
            } else {
                 $invoice = new Invoice();
                 $invoice->invoice_no = $request->invoice_no;
                 $invoice->date = date('Y-m-d', strtotime($request->date));
                 $invoice->description = $request->description;
                 $invoice->status = '0';
                 $invoice->created_by = Auth::user()->id;
                 DB::transaction(function() use ($request, $invoice){

                 if ($invoice->save()) {
                    $category_count = count($request->category_id);
                    for ($i=0; $i < $category_count; $i++) { 
                         $invoice_details = new InvoiceDetails();
                         $invoice_details->date = date('Y-m-d', strtotime($request->date));
                         $invoice_details->invoice_id = $invoice->id;
                         $invoice_details->product_id = $request->product_id[$i];
                         $invoice_details->category_id = $request->category_id[$i];
                         $invoice_details->selling_qty = $request->selling_qty[$i];
                         $invoice_details->unit_price = $request->unit_price[$i];
                         $invoice_details->selling_price = $request->selling_price[$i];
                         $invoice_details->status = '1';
                         $invoice_details->save();
                    }  

                       if ($request->customer_id == '0') {
                            $customer = new Customer();
                            $customer->name = $request->name;
                            $customer->mobile_no = $request->mobile_no;
                            $customer->email = $request->email;
                            $customer->address = $request->address;
                            $customer->save();
                            $customer_id = $customer->id;
                        }  else {
                            $customer_id = $request->customer_id;
                        }

                        $payment = new Payment();
                        $payment_details = new PaymentDetail();
                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status;
                        $payment->discount_amount = $request->discount_amount;
                        $payment->total_amount = $request->estimated_amount;  

                        if ($request->paid_status == 'full_paid') {
                            $payment->paid_amount = $request->estimated_amount;
                            $payment->due_amount = '0';
                            $payment_details->current_paid_amount = $request->estimated_amount;
                        } elseif ($request->paid_status == 'full_due') {
                            $payment->paid_amount = '0';
                            $payment->due_amount = $request->estimated_amount;
                            $payment_details->current_paid_amount - '0';
                        } elseif ($request->paid_status == 'partial_paid') {
                            $payment->paid_amount = $request->paid_amount;
                            $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                            $payment_details->current_paid_amount = $request->paid_amount;
                        }   

                        $payment->save();
                        $payment_details->invoice_id = $invoice->id;
                        $payment_details->date = date('Y-m-d', strtotime($request->date));
                        $payment_details->save();                          
                 }

               });
            }
        }

        return redirect()->route('invoice.view')->with('success','Invoice Created Successfully');
        
    }

    public function pending(){
    	$all_invoice_pending = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
    	return view('backend.invoice.pending_invoice', compact('all_invoice_pending'));
    }

    public function view_approve_pending($id){
        $invoice = Invoice::with(['invoice_details','payment'])->find($id);
        return view('backend.invoice.view_approve_pending',compact('invoice'));
    }

    public function approve($id){
    	// $purchase_data = Purchase::find($id);    	
    	// $product_data = Product::where('id', $purchase_data->product_id)->first();
    	// //$total_quantity = (($product_quantity_purchase) + ($product_quantity));
    	// // echo $product_quantity->quantity;
    	// $purchase_qty = ((float)($purchase_data->buying_qty)) + ((float)($product_data->quantity));
    	// $product_data->quantity = $purchase_qty;
    	// if ($product_data->save()) {
    	// 	$purchase_data->status = '1';
    	// $purchase_data->save();
    	// return redirect()->route('purchase.pending')->with('success', 'Purchase Approved Successfully');
    	// };
    }

    public function approval_store(Request $request, $id){
        foreach ($request->selling_qty as $key => $value) {
            $invoice_details = InvoiceDetails::where('id', $key)->first();
            $product = Product::where('id', $invoice_details->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                return redirect()->back()->with('error','Sorry! You approve maximum value');
            }
        }


        $invoice = Invoice::find($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status = '1';

        DB::transaction(function() use($request, $invoice, $id){
            foreach ($request->selling_qty as $key => $value) {
                $invoice_details = InvoiceDetails::where('id', $key)->first();
                $invoice_details->status = '1';
                $invoice_details->save();
                $product = Product::where('id', $invoice_details->product_id)->first();
                $product->quantity = ((float)$product->quantity) - ((float)$request->selling_qty[$key]);
                $product->save();
            }
            $invoice->save();
        });
        return redirect()->route('invoice.view')->with('success', 'Invoice Aprrove Successfully');
    }
    
    public function delete($id){
    	$invoice = Invoice::find($id);
    	$invoice->delete();
        InvoiceDetails::where('invoice_id', $invoice->id)->delete();
        Payment::where('invoice_id', $invoice->id)->delete();
        PaymentDetail::where('invoice_id', $invoice->id)->delete();
    	return redirect()->route('invoice.view')->with('success', 'Invoice Deleted Successfully');
    }
}


 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Invoice</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Invoice No: 
		<a class="btn btn-success btn-sm float-right" href="{{ route('purchase.view') }}"><i class="fa fa-list"></i> Invoice List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">                       
                         <table class="table">
                         	<tr>
                         		<th>Customer Info</th>
                         		<th>Name: {{ $invoice['payment']['customer']['name'] }}</th>
                         		<th>Mobile No: {{ $invoice['payment']['customer']['mobile_no'] }}</th>
                         		<th>Address: {{ $invoice['payment']['customer']['address'] }}</th>                         		
                         	</tr>
                         	<tr>
                         		<td></td>
                         		<th>Description: {{ $invoice->description }}</th>
                         	</tr>
                         </table>                           
                    </div>				         
             </div>
        </div>
   </div>

   <div class="card-body">
<form action="{{ route('approval.store',$invoice->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="my_form">
            @csrf
          <table class="table table-bordered">
  <thead>
    <tr>
    	<th width="6%">SL.</th>
      <th width="15%">Category</th>
      <th width="20%">Product Name</th>      
      <th class="text-center" style="background: #ddd;padding: 1px;" width="12%" scope="col">Current Stock</th>      
      <th width="7%" scope="col">Quantity</th>
      <th width="10%">Unit Price</th>
      <th width="10%">Total Price</th>
    </tr>
  </thead>
  <tbody>
@php $sub_total = 0; @endphp
@foreach($invoice['invoice_details'] as $key => $details)
  	<tr>
      <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
      <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
      <input type="hidden" name="selling_qty[{{ $details->id }}]" value="{{ $details->selling_qty }}">
  		<td>{{ $key + 1 }}</td>
  		<td>{{ $details['category']['name'] }}</td>
  		<td>{{ $details['product']['name'] }}</td>
  		<td class="text-center" style="background: #ddd;padding: 1px;">{{ $details['product']['quantity'] }}</td>
  		<td>{{ $details->selling_qty }}</td>
  		<td>{{ $details->unit_price }}</td>
  		<td>{{ $details->selling_price }}</td>
  	</tr>

  	@php
  		$sub_total += $details->selling_price; 
  	@endphp

@endforeach

  	<tr>
  		<td colspan="5"></td>
  		<td>Sub Total</td>
  		<td>{{ $sub_total }}</td>
  	</tr>
  	<tr>
  		<td colspan="5"></td>
  		<td>Discount</td>
  		<td>{{ $invoice['payment']['discount_amount'] }}</td>
  	</tr>
  	<tr>
  		<td colspan="5"></td>
  		<td>Paid Amount</td>
  		<td>{{ $invoice['payment']['paid_amount'] }}</td>
  	</tr>

  	<tr>
  		<td colspan="5"></td>
  		<td>Due Amount</td>
  		<td>{{ $invoice['payment']['due_amount'] }}</td>
  	</tr>
  	<tr>
  		<td colspan="5"></td>
  		<td>Grand Total</td>
  		<td>{{ $invoice['payment']['total_amount'] }}</td>
  	</tr>
  </tbody>
</table>

<div class="form-group">
	<input type="submit" class="btn btn-success" id="storeButton" value="Invoice Approve">
</div>

</form>

@endsection            
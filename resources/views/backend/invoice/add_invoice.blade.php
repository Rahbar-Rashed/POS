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
		<h3>Add Invoice
		<a class="btn btn-success btn-sm float-right" href="{{ route('purchase.view') }}"><i class="fa fa-list"></i>Invoice List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <!-- <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf -->
								<div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="text-input" class=" form-control-label">Invoice No</label>
                                           <input type="text" name="invoice_no" id="invoice_no" placeholder="Invoice No" value="{{ $invoice_count }}" class="form-control" readonly style="background-color: #D8FDBA;">
                                           
                                    </div>         
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Date</label>
                                           <input type="date" value="{{ $date }}" name="date" id="date" placeholder="YYYY-MM-DD" class="form-control datepicker">

                                           <span style="color: red;" class="text-danger" readonly>{{ $errors->first('date')  }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Category</label>
                                           <select name="category_id" id="category_id" class="form-control">
                                           		<option>Select Category</option>
                                                 @foreach($categories as $cat)
                                                 	<option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                 @endforeach
                                                                                                
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('category_id')  }}</span>
                                     </div>                                                                         
                                </div> 

                                <div class="form-row">
                                	
                                     <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Product Name</label>
                                           <select name="product_id" id="product_id" class="form-control">
                                                 <option value="">Select Product</option>                                        
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('unit_id')  }}</span>

                                     </div>  
                                       

                                    <div class="form-group col-md-2">
                                        <label for="text-input" class="form-control-label">Stock Quantity</label>
                                           <input type="text" id="current_stock_qty" class="form-control form-control-sm" name="" readonly="" style="background-color: #D8FDBA;">
                                            

                                    </div>
                                    <div class="form-group col-md-1">
                                        <i style="margin-top: 32px" class="btn btn-success fa fa-plus-circle addeventmore"> Add More </i>
                                    </div>                            
                                </div>				         
             </div>
        </div>
   </div>

   <div class="card-body">
   		<form action="{{ route('invoice.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="my_form">
            @csrf

            <table class="table table-bordered">
  <thead>
    <tr>
      <th width="22%">Category Name</th>
      <th width="22%">Product Name</th>
      <th width="10%">Pcs/Kg</th>
      <th width="10%" scope="col">Unit Price</th>      
      <th width="14%" scope="col">Total Price</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody id="addRow" class="addRow">   
  
  </tbody>
  <tbody>
  	<tr>
      <td colspan="3"></td>
      <td>Discount</td>
      <td>
      	<input type="number"  name="discount_amount" value="" id="discount_amount" class="form-control form-control-sm text-right discount_amount" placeholder="Disc: Amount">
      </td>
      <td></td>   
    </tr>
    <tr>
      <td colspan="3"></td>
      <td>Grand Total</td>
      <td>
      	<input type="text"  name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
      </td>
      <td></td>   
    </tr>
  </tbody>
</table>
<br/>
<div class="form-row">
                                	
                            <div class="form-group col-md-12"><label for="text-input" class=" form-control-label">Description</label><textarea class="form-control" id="" name="description" rows="4" cols="50" placeholder="Write Description Here"></textarea>

                                     </div> 
</div>
<div class="form-row">
                                	
                                     <div class="form-group col-md-3">
                                        <label for="text-input" class=" form-control-label">Paid Status</label>
                                           
                                            <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                            	<option value="">Select Option</option>
                                            	<option value="full_paid">Full Paid</option>
                                            	<option value="partial_paid">Partial Paid</option>
                                            	<option value="full_due">Full Due</option>
                                            </select>
                                            <br>
                                            <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                                     </div> 

                                     <div class="form-group col-md-7">
                                        <label for="text-input" class=" form-control-label">Customer</label>
                                           
                                            <select name="customer_id" id="customer_id" class="form-control form-control-sm">
                                            	<option value="">Select Customoer</option>
                                            	@foreach($customers as $customer)
                                            	<option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->mobile_no }} - {{ $customer->address }})</option>
                                            	@endforeach
                                            	<option value="0">New Customer</option>
                                            </select>
                                           
                                     </div>
</div>

<div class="form-row new_customer" style="display: none;">
	<div class="form-group col-md-4">
		<input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Write Customer Name">
	</div>
	<div class="form-group col-md-4">
		<input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-sm" placeholder="Write Mobile Name">
	</div>
	<div class="form-group col-md-4">
		<input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="Write Email">
	</div>
	<div class="form-group col-md-4">
		<input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Write Address">
	</div>
</div>

<div class="form-group">
	<input type="submit" class="btn btn-primary" id="storeButton" value="Invoice Store">
</div>
        </form>                    	
   </div>
                
</div>
     

 <script id="document-template" type="text/x-handlebars-template">
 	<tr class="delete_add_more_item" id="delete_add_more_item">
 		<input type="hidden" name="date" value="@{{date}}">
 		<input type="hidden" name="invoice_no" value="@{{invoice_no}}"> 		
 		<td>
 			<input type="hidden" name="category_id[]" value="@{{category_id}}">
 			@{{ category_name }}
 		</td>	
 		<td>
 			<input type="hidden" name="product_id[]" value="@{{product_id}}">
 			@{{ product_name }}
 		</td>
 		<td>
 			<input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
 			@{{ buying_qty }}
 		</td>
 		<td>
 			<input type="number" min="1" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
 			@{{ unit_price }}
 		</td>
 		
 		<td>
 			<input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly> 			
 		</td>
 		<td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
 	</tr>
 </script>


 <script type="text/javascript">
 	$(document).ready(function (){
 		$(document).on("click", ".addeventmore", function(){
 		var date = $('#date').val();
 		var invoice_no = $('#invoice_no').val();		
 		var category_id = $('#category_id').val();
 		var category_name = $('#category_id').find('option:selected').text();
 		var product_id = $('#product_id').val();
 		var product_name = $('#product_id').find('option:selected').text();

 		if (date=='') {
 			$.notify("Date is required", {globalPosition: 'top right',className:'error'});
 			return false;
 		}

 		if (category_id == ''){
 			$.notify("Category Id is required", {globalPosition: 'top right',className:'error'});
 			return false;
 		}

 		if (product_id == ''){
 			$.notify("Product Id is required", {globalPosition: 'top right',className:'error'});
 			return false;
 		}


 		var source = $("#document-template").html();
 		var template = Handlebars.compile(source);
 		var data = {
 			date: date, 			
 			category_id: category_id,
 			category_name: category_name,
 			product_id: product_id,
 			product_name: product_name,
 			invoice_no: invoice_no
 		};
 		var html = template(data);

 		$("#addRow").append(html);

 		$(document).on("click", ".removeeventmore", function(event){
 			$(this).closest(".delete_add_more_item").remove();
 			totalAmountPrice();
 		});

 		$(document).on("keyup click", ".unit_price,.selling_qty", function(){
 			var unit_price = $(this).closest("tr").find("input.unit_price").val();
 			var qty = $(this).closest("tr").find("input.selling_qty").val();
 			var total = unit_price * qty;
 			$(this).closest("tr").find("input.selling_price").val(total);
 			$('#discount_amount').trigger('keyup');
 		});

 		$(document).on('keyup', function(){
 			totalAmountPrice();
 		});

 		function totalAmountPrice(){
 			var sum = 0;
 			$(".selling_price").each(function(){
 				var value = $(this).val();
 				if(!isNaN(value) && value.length != 0){
 					sum += parseFloat(value);
 				}
 			});

 			var discount_amount = parseFloat($('#discount_amount').val());
 			if(!isNaN(discount_amount) && discount_amount.length != 0){
 					sum -= parseFloat(discount_amount);
 				}
 			$('#estimated_amount').val(sum);
 		}

 		});

 	});
 </script>
   

<script type="text/javascript">
	$(function (){
		$(document).on('change','#category_id', function(){

			var category_id = $(this).val();
			
			$.ajax({
				url: "{{ route('get-product') }}",
				type: "GET",
				data: {category_id: category_id},
				success: function(data){				
					
					var html = '<option value=""> Select Product </option>';
					$.each(data, function(key, value){
						html += '<option value="'+value.id+'">'+value.name+'</option>'
					});

					$('#product_id').html(html);
				}
			});
		});
	});
</script>   

<script type="text/javascript">
	$(function(){
		$(document).on('change','#product_id', function(){
			var product_id = $(this).val();
			$.ajax({
				url: "{{ route('check-product-stock') }}",
				type: "GET",
				data: {product_id: product_id},
				success: function(data) {
					$('#current_stock_qty').val(data);
				}
			});
		});
	});
</script>

<script type="text/javascript">
// Paid Status

	$(document).on('change','#paid_status', function(){
		var paid_status = $(this).val();
		if (paid_status == 'partial_paid') {
			$('.paid_amount').show();
		} else {
			$('.paid_amount').hide();
		}
	});
</script>

<script type="text/javascript">
// Paid Status

	$(document).on('change','#customer_id', function(){
		var customer_id = $(this).val();
		if (customer_id == '0') {
			$('.new_customer').show();
		} else {
			$('.new_customer').hide();
		}
	});
</script>

@endsection            
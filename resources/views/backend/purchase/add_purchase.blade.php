 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Purchase</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Add Purchase
		<a class="btn btn-success btn-sm float-right" href="{{ route('purchase.view') }}"><i class="fa fa-list"></i> Purchase List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <!-- <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf -->
								<div class="form-row">
                                                            
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Date</label>
                                           <input type="date" name="date" id="date" placeholder="YYYY-MM-DD" class="form-control datepicker">

                                           <span style="color: red;" class="text-danger" readonly>{{ $errors->first('date')  }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Purchase No</label>
                                           <input type="text" name="purchase_no" id="purchase_no" placeholder="Purchase Noe" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('purchase_no')  }}</span>
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Supplier</label>
                                           <select name="supplier_id" id="supplier_id" class="form-control">
                                                 <option value="">Select Supplier</option>

                                                 @foreach($suppliers as $supplier)
                                                 <option value="{{ $supplier->id }}" >{{ $supplier->name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('supplier_id')  }}</span>
                                     </div>                                       
                                </div>   


                                <div class="form-row">
                                	<div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Category</label>
                                           <select name="category_id" id="category_id" class="form-control">
                                           		<option value="">Select Category</option>
                                                 
                                                                                                
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('category_id')  }}</span>
                                     </div>
                                     <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Product Name</label>
                                           <select name="product_id" id="product_id" class="form-control">
                                                 <option value="">Select Product</option>
                                                                                            
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('unit_id')  }}</span>

                                     </div>    

                                     <div class="form-group col-md-2">
                                        <i style="margin-top: 36px" class="btn btn-success fa fa-plus-circle addeventmore"> Add More </i>
                                     </div>                     
                                    
                                                                       
                                </div>
                        
                            <!-- </form>   -->  
				         
             </div>
        </div>
   </div>

   <div class="card-body">
   		<form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="my_form">
            @csrf

            <table class="table table-bordered">
  <thead>
    <tr>
      <th>Category Name</th>
      <th>Product Name</th>
      <th width="7%">Pcs/Kg</th>
      <th width="10%" scope="col">Unit Price</th>
      <th>Description</th>
      <th width="10%" scope="col">Total Price</th>
      <th width="7%">Action</th>
    </tr>
  </thead>
  <tbody id="addRow" class="addRow">
    
  </tbody>

  <tbody>
    <tr>
      <td colspan="5"></td>

      <td>
      	<input type="text"  name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
      </td>
      <td></td>
      
    </tr>
  </tbody>

</table>
<br/>
<div class="form-group">
	<input type="submit" class="btn btn-primary" id="storeButton" value="Purchase Store">
</div>
        </form>                    	
   </div>
                
</div>
     

 <script id="document-template" type="text/x-handlebars-template">
 	<tr class="delete_add_more_item" id="delete_add_more_item">
 		<input type="hidden" name="date[]" value="@{{date}}">
 		<input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
 		<input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
 		<td>
 			<input type="hidden" name="category_id[]" value="@{{category_id}}">
 			@{{ category_name }}
 		</td>	
 		<td>
 			<input type="hidden" name="product_id[]" value="@{{product_id}}">
 			@{{ product_name }}
 		</td>
 		<td>
 			<input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
 			@{{ buying_qty }}
 		</td>
 		<td>
 			<input type="number" min="1" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
 			@{{ unit_price }}
 		</td>
 		<td>
 			<input type="text" class="form-control form-control-sm" name="description[]">
 		</td>
 		<td>
 			<input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly> 			
 		</td>
 		<td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
 	</tr>
 </script>

 <script type="text/javascript">
 	$(document).ready(function (){
 		$(document).on("click", ".addeventmore", function(){
 		var date = $('#date').val();
 		var purchase_no = $('#purchase_no').val();
 		var supplier_id = $('#supplier_id').val(); 		
 		var category_id = $('#category_id').val();
 		var category_name = $('#category_id').find('option:selected').text();
 		var product_id = $('#product_id').val();
 		var product_name = $('#product_id').find('option:selected').text();

 		if (date=='') {
 			$.notify("Date is required", {globalPosition: 'top right',className:'error'});
 			return false;
 		}

 		if (purchase_no=='') {
 			$.notify("Purchase No is required", {globalPosition: 'top right',className:'error'});
 			return false;
 		}

 		if (supplier_id == ''){
 			$.notify("Supplier Id is required", {globalPosition: 'top right',className:'error'});
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
 			purchase_no: purchase_no,
 			supplier_id: supplier_id, 			
 			category_id: category_id,
 			category_name: category_name,
 			product_id: product_id,
 			product_name: product_name
 		};
 		var html = template(data);

 		$("#addRow").append(html);

 		$(document).on("click", ".removeeventmore", function(event){
 			$(this).closest(".delete_add_more_item").remove();
 			totalAmountPrice();
 		});

 		$(document).on("keyup click", ".unit_price,.buying_qty", function(){
 			var unit_price = $(this).closest("tr").find("input.unit_price").val();
 			var qty = $(this).closest("tr").find("input.buying_qty").val();
 			var total = unit_price * qty;
 			$(this).closest("tr").find("input.buying_price").val(total); 			
 			totalAmountPrice();
 		});

 		function totalAmountPrice(){
 			var sum = 0;
 			$(".buying_price").each(function(){
 				var value = $(this).val();
 				if(!isNaN(value) && value.length != 0){
 					sum += parseFloat(value);
 				}
 			});
 			$('#estimated_amount').val(sum);
 		}

 		});

 	});
 </script>

<script type="text/javascript">
	$(function (){
		$(document).on('change','#supplier_id', function(){

			var supplier_id = $(this).val();
			
			$.ajax({
				url: "{{ route('get-category') }}",
				type: "GET",
				data: {supplier_id: supplier_id},
				success: function(data){				
					
					var html = '<option value=""> Select Category </option>';
					$.each(data, function(key, value){
						html += '<option value="'+value.category_id+'">'+value.category.name+'</option>'
					});

					$('#category_id').html(html);
				}
			});
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
					
					var html = '<option value=""> Select Products </option>';
					$.each(data, function(key, value){
						html += '<option value="'+value.id+'">'+value.name+'</option>'
					});

					$('#product_id').html(html);
				}
			});
		});
	});
</script>   



@endsection            
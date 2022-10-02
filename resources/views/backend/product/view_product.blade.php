 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Product</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Product List
		<a class="btn btn-success btn-sm float-right" href="{{ route('product.add') }}"><i class="fa fa-plus-circle"></i> Add Product</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                            
                           <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th> 
                                            <th>Supplier Name</th>
                                            <th>Category</th>
                                            <th>Name</th>                                
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($all_product as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product['supplier']['name'] }}</td>
                                            <td>{{ $product['category']['name'] }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td> {{ $product->quantity }} {{ $product['unit']['name'] }}</td>                                        
                                            <td>
                                            	<a title="Edit" href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                                @php
                                                $count_product = App\Model\Purchase::where('product_id', $product->id)->count();
                                                @endphp

                                                @if($count_product < 1)

                                            	<a title="Delete" id="delete" href="{{ route('product.delete',$product->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>SL.</th> 
                                            <th>Supplier Name</th>
                                            <th>Category</th>
                                            <th>Name</th>                                
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>	
                                </table>
                         </div>
                       
                    </div>


                </div>
            </div>
	</div>
</div>

         

@endsection            
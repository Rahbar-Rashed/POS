 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Supplier</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Supplier List
		<a class="btn btn-success btn-sm float-right" href="{{ route('suppliers.add') }}"><i class="fa fa-plus-circle"></i> Add Supplier</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                            
                           
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($all_suppliers as $key => $supplier)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->mobile_no }}</td>
                                            
                                            <td>
                                            	<a title="Edit" href="{{ route('suppliers.edit',$supplier->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                                @php
                                                $count_supplier = App\Model\Product::where('supplier_id', $supplier->id)->count();

                                                @endphp

                                                @if($count_supplier <  1)

                                            		<a title="Delete" id="delete" href="{{ route('suppliers.delete',$supplier->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                @endif    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>SL.</th>                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>	
                                </table>
                         
                       
                    </div>


                </div>
            </div>
	</div>
</div>

         

@endsection            
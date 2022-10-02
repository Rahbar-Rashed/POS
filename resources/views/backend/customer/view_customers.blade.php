 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Customers</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Customers List
		<a class="btn btn-success btn-sm float-right" href="{{ route('customer.add') }}"><i class="fa fa-plus-circle"></i> Add Customer</a>
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
                                    	@foreach($all_customer as $key => $customer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->mobile_no }}</td>
                                            
                                            <td>
                                            	<a title="Edit" href="{{ route('customer.edit',$customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>



                                            		<a title="Delete" id="delete" href="{{ route('customer.delete',$customer->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
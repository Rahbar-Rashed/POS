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
		<h3>Add Supplier
		<a class="btn btn-success btn-sm float-right" href="{{ route('suppliers.view') }}"><i class="fa fa-list"></i> Supplier List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf
								<div class="form-row">
                                                            
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                           <input type="text" name="name" placeholder="Enter Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label for="email-input" class=" form-control-label">Mobile</label>
                                           <input type="text" name="mobile_no" placeholder="Enter Mobile Number" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('mobile_no')  }}</span>
                                     </div>
                                    
                                </div>
                                <div class="form-row">
                                     <div class="form-group col-md-6">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                           <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                                     </div>                        
                                    <div class="form-group col-md-6">
                                        <label for="email-input" class=" form-control-label">Address</label>
                                           <input type="text" name="address" placeholder="Enter Address" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('address')  }}</span>
                                     </div>
                                                                       
                                </div>
                         <input type="submit" class="btn btn-primary btn-sm" value="Submit"> 
                            </form>    
				         
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
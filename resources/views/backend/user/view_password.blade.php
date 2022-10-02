 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Password</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Edit Password
		<a class="btn btn-success btn-sm float-right" href="{{ route('users.view') }}"><i class="fa fa-list"></i> User List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf
								
                                <div class="form-row">
                                         
                                    <div class="form-group col-md-4">
                                       <label for="email-input" class=" form-control-label">Current Password</label>
                                           <input type="text" name="current_password" placeholder="Enter Current Password" class="form-control" value="{{ old('current_password') }}">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('current_password')  }}</span>
                                     </div>                        
                                    <div class="form-group col-md-4">
                                       <label for="email-input" class=" form-control-label">New Password</label>
                                           <input type="text" name="password" placeholder="Enter New Password" class="form-control" value="{{ old('password') }}">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('password')  }}</span>
                                     </div>
                                    <div class="form-group col-md-4">
                                       <label for="email-input" class=" form-control-label">Confirm Password</label>
                                           <input type="text" name="password_confirmation" placeholder="Enter New Password Again" value="{{ old('password') }}" class="form-control">
                                           
                                     </div>                                    
                                </div>
                         <input type="submit" class="btn btn-primary btn-sm" value="Update"> 
                            </form>    
				         
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage User</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Add User
		<a class="btn btn-success btn-sm float-right" href="{{ route('users.view') }}"><i class="fa fa-list"></i> User List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf
								<div class="form-row">
                                                            
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                           <input type="text" name="name" placeholder="Enter Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                           <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                                     </div>
                                </div>
                                <div class="form-row">
                                                            
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Role</label>
                                           <select name="user_type" id="select" class="form-control">
                                                 <option value="0">Please select</option>
                                                 <option value="Admin">Admin</option>
                                                 <option value="User">User</option>                                                 
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('user_type')  }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label for="email-input" class=" form-control-label">Password</label>
                                           <input type="text" name="password" placeholder="Enter Email" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('password')  }}</span>
                                     </div>                                    
                                </div>
                         <input type="submit" class="btn btn-primary btn-sm" value="Submit"> 
                            </form>    
				         
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
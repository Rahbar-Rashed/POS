 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Profile</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Edit Profile
		<a class="btn btn-success btn-sm float-right" href="{{ route('profile.view') }}"><i class="fa fa-list"></i> Your Profile</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('profile.update',$edit_data->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf
								<div class="form-row">
                                                            
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                           <input type="text" name="name" value="{{ $edit_data->name }}" placeholder="Enter Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                           <input type="email" name="email" value="{{ $edit_data->email }}" placeholder="Enter Email" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                                     </div>
                                     <div class="form-group col-md-4">
                                        <label for="email-input" class=" form-control-label">Mobile</label>
                                           <input type="text" name="mobile" value="{{ $edit_data->mobile }}" placeholder="Enter Mobile" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                                     </div>
                                 </div>
                                   
                                     
                                
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="email-input" class=" form-control-label">Address</label>
                                           <input type="text" name="address" value="{{ $edit_data->address }}" placeholder="Enter Address" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('email')  }}</span>
                                     </div>       
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Gender</label>
                                           <select name="gender" id="select" class="form-control">
                                                 <option value="0">Select Gender</option>
                                                 <option value="Male" {{ ($edit_data->gender == "Male") ? "selected"  : "" }} >Male</option>
                                                 <option value="Female" {{ ($edit_data->gender == "Female") ? "selected"  : "" }} >Female</option>                                                
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('gender')  }}</span>
                                    </div>
                                                                    
                                </div>
                                <div class="form-row">                                        
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Old Image</label>
                                           <img id="show_img" src="{{(!empty($edit_data->image)) ? asset('public/BackEnd/uploads/users_images/'.$edit_data->image) : asset('public/BackEnd/uploads/no_image.png') }}" style="height: 100px;width: 100px;border: 1px solid black;">
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <label for="text-input" class=" form-control-label">Image</label>
                                           <input type="file" id="image" name="image" class="form-control" id="image">
                                            <span style="color: red;" class="text-danger">{{ $errors->first('gender')  }}</span>
                                    </div>                                
                                </div>

                         <input type="submit" class="btn btn-primary btn-sm" value="Update"> 
                            </form>    
				         
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
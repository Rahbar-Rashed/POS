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
	
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-6 offset-md-3">
                       
                            
                           
                                <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">User Profile</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" style="width: 50%;" src="{{(!empty($user->image)) ? asset('public/BackEnd/uploads/users_images/'.$user->image) : asset('public/BackEnd/uploads/no_image.png') }}" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1">{{ $user->name }}</h5>
                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{ $user->address }}</div>
                </div>
                <hr>
                <div class="card-body">                    
                    <div class="row">
                    <div class="col-sm-5">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                        {{ $user->email }}
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-sm-5">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                    {{ $user->mobile }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                    {{ $user->address }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                    {{ $user->gender }}
                    </div>
                  </div>


            </div>
            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>

        </div>
                         
                       
                    </div>


                </div>
            </div>
	</div>
</div>

         

@endsection            
 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Unit</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Edit Unit
		<a class="btn btn-success btn-sm float-right" href="{{ route('units.view') }}"><i class="fa fa-list"></i> Unit List</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('units.update',$unit_data->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            	@csrf
								<div class="form-row">
                                                            
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Unit Name</label>
                                           <input type="text" name="name" value="{{ $unit_data->name }}" placeholder="Enter Unit Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>                                    
                                    
                                </div>
                                
                         <input type="submit" class="btn btn-primary btn-sm" value="Update"> 
                            </form>    
				         
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
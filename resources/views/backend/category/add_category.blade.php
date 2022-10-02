 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Category</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
  <div class="card-header">
    <h3>Add Category
    <a class="btn btn-success btn-sm float-right" href="{{ route('units.view') }}"><i class="fa fa-list"></i> Category List</a>
    </h3>
  </div>
  <div class="card-body">
    <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              @csrf
                <div class="form-row">
                                                            
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Category Name</label>
                                           <input type="text" name="name" placeholder="Enter Unit Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>                                    
                                    
                                </div>
                                
                         <input type="submit" class="btn btn-primary btn-sm" value="Submit"> 
                            </form>    
                 
             </div>
        </div>
   </div>
                
</div>

</div>

         

@endsection            
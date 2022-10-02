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
        <h3>Category List
        <a class="btn btn-success btn-sm float-right" href="{{ route('category.add') }}"><i class="fa fa-plus-circle"></i> Add Category</a>
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
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_category as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>           
                                            
                                            <td>
                                                <a title="Edit" href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                                 @php
                                                $count_category = App\Model\Product::where('category_id', $category->id)->count();

                                                @endphp

                                                @if($count_category < 1)

                                                <a title="Delete" id="delete" href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>SL.</th>                                           
                                            <th>Name</th>
                                            
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
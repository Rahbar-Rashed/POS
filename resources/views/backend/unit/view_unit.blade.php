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
		<h3>Unit List
		<a class="btn btn-success btn-sm float-right" href="{{ route('units.add') }}"><i class="fa fa-plus-circle"></i> Add Unit</a>
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
                                    	@foreach($all_unit as $key => $unit)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $unit->name }}</td>                                          
                                            
                                            <td>
                                            	<a title="Edit" href="{{ route('units.edit',$unit->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                @php
                                                $count_unit = App\Model\Product::where('unit_id', $unit->id)->count();

                                                @endphp

                                                @if($count_unit < 1)
                                            		<a title="Delete" id="delete" href="{{ route('units.delete',$unit->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
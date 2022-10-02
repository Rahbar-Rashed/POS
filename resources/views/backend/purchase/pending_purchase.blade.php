 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Pending Purchase</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Pending Purchase List
		<a class="btn btn-success btn-sm float-right" href="{{ route('purchase.add') }}"><i class="fa fa-plus-circle"></i> Add Purchase</a>
		</h3>
	</div>
	<div class="card-body">
		<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                            
                           
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>SL.</th> 
                                            <th>Purchase No</th>
                                            <th>Purchase Date</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th> 
                                            <th>Category Name</th>   
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Buying Price</th>                             
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($all_purchase_pending as $key => $purchase_pending)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $purchase_pending->purchase_no }}</td>
                                            <td>{{ date('d-m-y', strtotime($purchase_pending->date)) }}</td>
                                            <td>{{ $purchase_pending['product']['name'] }}</td>
                                            <td>{{ $purchase_pending['supplier']['name'] }}</td>
                                            <td>{{ $purchase_pending['category']['name'] }}</td>
                                            <td>{{ $purchase_pending->buying_qty }}
                                                {{ $purchase_pending['product']['unit']['name'] }}
                                            </td>
                                            <td>{{ $purchase_pending->unit_price }}</td>
                                            <td>{{ $purchase_pending->buying_price }}</td>
                                            <td>
                                                @if($purchase_pending->status == '0')
                                                <span style="background: #FC4236; padding:5px;">Pending</span>
                                                @elseif($purchase_pending->status == '1')
                                                <span style="background: #5EAB00;padding:5px;">Approve</span>
                                                @endif
                                            </td>                                        
                                            <td>
                                            	@if($purchase_pending->status == '0')

                                            	<a title="Purchase Approve" id="approve_btn" href="{{ route('purchase.approve',$purchase_pending->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <th>SL.</th> 
                                            <th>Purchase No</th>
                                            <th>Purchase Date</th>
                                            <th>Product Name</th>
                                            <th>Supplier Name</th> 
                                            <th>Category Name</th>   
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Buying Price</th>                             
                                            <th>Status</th>
                                            <th>Action</th>
                                    </thead>	
                                </table>
                         
                       
                    </div>


                </div>
            </div>
	</div>
</div>

         

@endsection            
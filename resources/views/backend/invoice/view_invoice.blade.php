 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Invoice</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Invoice List
		<a class="btn btn-success btn-sm float-right" href="{{ route('invoice.add') }}"><i class="fa fa-plus-circle"></i> Add Invoice</a>
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
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Due Amount</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>   
                                            <th>Customer Name</th>                                 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($all_invoice as $key => $invoice)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>Invc No #{{ $invoice->invoice_no }}</td>
                                            <td>{{ date('d-m-y', strtotime($invoice->date)) }}</td>                               
                                            <td>{{ $invoice['payment']['paid_amount'] }}                                              
                                            </td>
                                            <td>{{ $invoice['payment']['due_amount'] }}                                              
                                            </td>
                                            <td>{{ $invoice['payment']['total_amount'] }}                                              
                                            </td>                                            
                                            <td>
                                                @if($invoice->status == '0')
                                                <span style="background: #FC4236; padding:5px;">Pending</span>
                                                @elseif($invoice->status == '1')
                                                <span style="background: #5EAB00;padding:5px;">Approve</span>
                                                @endif
                                            </td> 
                                            <td>{{ $invoice['payment']['customer']['name'] }}</td>                                       
                                            <td>                                          	

                                            	<a title="Delete" id="delete" href="{{ route('invoice.delete',$invoice->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>SL.</th> 
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Status</th>                                    
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
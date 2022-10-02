 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Pending Invoice</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
	<div class="card-header">
		<h3>Pending Invoice List
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
                                            <th>Customer Name</th>
                                            <th>Payment</th>
                                            <th>Due Amount</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($all_invoice_pending as $key => $pending_invoice)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>Invc No #{{ $pending_invoice->invoice_no }}</td>
                                            <td>{{ date('d-m-y', strtotime($pending_invoice->date)) }}</td>
                                            <td>{{ $pending_invoice['payment']['customer']['name'] }}</td>
                                            <td>{{ $pending_invoice['payment']['paid_amount'] }} </td>
                                            <td>{{ $pending_invoice['payment']['due_amount'] }}</td>
                                            <td>{{ $pending_invoice['payment']['total_amount'] }}</td>
                                            <td>
                                                @if($pending_invoice->status == '0')
                                                <span style="background: #FC4236; padding:5px;">Pending</span>
                                                @elseif($pending_invoice->status == '1')
                                                <span style="background: #5EAB00;padding:5px;">Approve</span>
                                                @endif
                                            </td>
                                            <td>
                                            	<a title="Approve" href="{{ route('view.approve.pending',$pending_invoice->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i></a>

                                            	<a title="Delete" id="approve_btn" href="{{ route('invoice.delete',$pending_invoice->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>SL.</th> 
                                            <th>Invoice No</th>
                                            <th>Date</th>
                                            <th>Customer Name</th>
                                            <th>Payment</th>
                                            <th>Due Amount</th>
                                            <th>Total Amount</th>
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
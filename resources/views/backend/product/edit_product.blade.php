 @extends('backend.layouts.master')
 @section('content')

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Product</h1>
                    </div>
                </div>
            </div>
            
        </div>

<div class="card">
  <div class="card-header">
    <h3>Edit Product
    <a class="btn btn-success btn-sm float-right" href="{{ route('product.view') }}"><i class="fa fa-list"></i> Product List</a>
    </h3>
  </div>
  <div class="card-body">
    <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">                       
                            <form action="{{ route('product.update', $product_data->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              @csrf
                <div class="form-row">
                                                            
                                    <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Product Name</label>
                                           <input type="text" name="name" value="{{ $product_data->name }}" placeholder="Enter Name" class="form-control">
                                           <span style="color: red;" class="text-danger">{{ $errors->first('name')  }}</span>
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Supplier</label>
                                           <select name="supplier_id" id="select" class="form-control">
                                                 <option value="">Select Supplier</option>

                                                 @foreach($suppliers as $supplier)
                                                 <option value="{{ $supplier->id }}" {{ ($product_data->supplier_id == $supplier->id) ? "selected" : '' }}>{{ $supplier->name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('supplier_id')  }}</span>

                                     </div>
                                                                         
                                    
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Category</label>
                                           <select name="category_id" id="select" class="form-control">
                                              <option value="">Select Category</option>
                                                 @foreach($categories as $category)
                                                 <option value="{{ $category->id }}" {{ ($product_data->category_id == $category->id) ? "selected" : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                                                                                
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('category_id')  }}</span>
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="text-input" class=" form-control-label">Unit</label>
                                           <select name="unit_id" id="select" class="form-control">
                                                 <option value="">Select Unit</option>
                                                 @foreach($units as $unit)
                                                 <option value="{{ $unit->id }}" {{ ($product_data->unit_id == $unit->id) ? "selected" : '' }}>{{ $unit->name }}</option>
                                                @endforeach                                              
                                            </select>
                                            <span style="color: red;" class="text-danger">{{ $errors->first('unit_id')  }}</span>

                                     </div>                       
                                    
                                                                       
                                </div>
                         <input type="submit" class="btn btn-primary btn-sm" value="Update"> 
                            </form>    
                 
             </div>
        </div>
   </div>
                
</div>



         

@endsection            
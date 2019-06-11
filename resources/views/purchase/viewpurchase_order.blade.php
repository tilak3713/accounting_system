@extends('layouts.app')
@section('content')
<!-- DataTales Example -->
 @if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
<h1 class="h3 mb-2 text-gray-800">Purchase Order</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<a href="{{url('purchase/add_purchase_order')}}" class="btn btn-success" style="float: right;">Add</button></a>
        <h6 class="m-0 font-weight-bold text-primary">List of Purchase Order</h6>
    </div>

   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>                        
                        <th>Purchase Date</th>
                        <th>Purchase No.</th>
                        <th>Closing Date</th>
                        <th>Supplier</th>
                        
                         <th>Supplier Amount</th>
                       
                        <th>Supplier Outstanding Amount</th>
                       
                        
                        <th>Action</th>                                      
                    </tr>
                </thead>              
                <tbody>                  
                      @foreach($data as $result)          
                    <tr>                      
                        
                       <td>{{date('d/m/Y',strtotime($result->purchase_date))}}</td>
                       <td>{{$result->id}}</td>
                       <td>{{date('d/m/Y',strtotime($result->po_closing_date))}}</td>
                       <td>{{ $supplierlist[$result->po_supplier_name]}}</td>
                       
                       <td>{{$result->pi_supplier_amount}}</td>
                      
                        <td>{{$result->pi_supplier_amount}}</td>
                         
                       
                         <td> <a href="{{url('purchase/view_all_details_po',$result->id)}}"><i class="fa fa-eye" title="View All Details"></i></a>
                            <a href="{{url('purchase/edit_purchase_order',$result->id)}}"><i class="fa fa-edit" title="Edit"></i></a>
                        <a href="{{url('purchase/delete_purchase_order',$result->id)}}" onclick="if(confirm('Are you sure want to delete?')) commentDelete(1); return false"><i class="fa fa-trash" title="Delete" style="color: red";></i></a>
                        </td>         
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
   </div>
</div>
@endsection()
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
      <a href="{{url('purchase/add_purchase_order')}}" class="btn btn-success" style="float: right;">Add</a> 
      
        <h6 class="m-0 font-weight-bold text-primary">List of Purchase Item Of Purchase Order</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>                        
                        <th>Purchase Date</th>
                        <th>Purchase Item No.</th>
                        <th>Closing Date</th>
                        <th>Supplier</th>
                        <th>Currency</th>
                        <th>Supplier Amount</th>
                        <th>Amount(AUD)</th>
                        <th>Supplier Outstanding Amount</th>
                        <th>Narration</th>
                        <th>Vouchar No.</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach($data as $result)
                    <tr>
                      <td>{{date('d/m/Y',strtotime($result->purchase_date))}}</td>
                      <td>{{$result->id}}</td>
                      <td>{{date('d/m/Y',strtotime($result->po_closing_date))}}</td>

                      <td>{{$result->po_supplier_name}}</td>
                      <td>
                          @if(isset($currency_list[$result->po_supplier_currency]))

                         {{ $currency_list[$result->po_supplier_currency] }}

                          @endif
                      </td>
                      <td>
                      @if(isset($supplierlist[$result->po_supplier_name]))    
                         {{ $supplierlist[$result->po_supplier_name] }}
                      @endif                      
                      </td>
                      <td>{{ $currency_list[$result->po_supplier_currency]}}</td>
                      <td>{{$result->pi_supplier_amount}}</td>                     
                      <td>{{$result->po_narration}}</td>
                      <td>0</td>
                      <td>{{$result->created_at->format('d/m/Y g:i A')}}</td>
                      <td>{{$result->updated_at->format('d/m/Y g:i A')}}</td>
                      <td>
                        <a href="{{url('purchase/delete_purchase_item',$result->id)}}" onclick="if(confirm('Are you sure want to delete?')) commentDelete(1); return false"><i class="fa fa-trash" title="Delete" style="color: red";></i></a>
                      </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{url('purchase/view_purchase_order')}}" class="btn btn-success" style="float: right;">Back</a>
   </div>
</div>
@endsection()
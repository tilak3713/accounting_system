@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of Account Discounts</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ url('acounts-discount-add')}} " class="btn btn-success pull-right" style="float:right"> Add</a>
        
        <p class="m-0 font-weight-bold text-primary">Account Discounts </p>
    </div>

    <div class="card-body">
        <div class="">
            <table class=" table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> Accounts  </th>
                        <th> Discount Type</th>
                        <th> Discount Period</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
          @foreach($list as $row)
                    <tr>
                        <td>{{$row->account_name}} </td>
                        <td>{{$row->discount_type}} </td>
                        <td>{{$row->discount_period}}  </td>
                        <td>{{$row->created_at}} </td>
                        <td>{{$row->updated_at}} </td>
                        <td>
                            <a href=" {{url('account-discount-edit/'.$row->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            
                            <a href="{{url('account-discount-delete/'.$row->id)}} " title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach()
   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
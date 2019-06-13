@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of Tax <a href="{{url('tax/add-new')}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Add New</a> </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tax Data Tables</h6>

    </div>
    <div class="card-body">
        <div class="">
            <table class="table dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tax Code</th>  
                        <th>Tax type name</th> 
                        <th>Tax Rate %</th> 
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>                   
                     @foreach($Tax as $data)
                     <tr>
                         <td>{{$data->id}}</td>
                         <td>{{$data->tax_type_code}}</td>
                         <td>{{$data->tax_type_name}}</td>
                         <td>{{$data->tax_rate}}%</td>
                         
                         <td>{{$data->created_at}}</td>
                         <td>{{$data->updated_at}}</td>
                          <td>
                            <a href="{{url('tax/read/'.$data->id)}}" title="Read" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{url('tax/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{url('tax/delete/'.$data->id)}}" onclick="return confirm('Are sure ?')" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                        </td>
                     </tr>
                     @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

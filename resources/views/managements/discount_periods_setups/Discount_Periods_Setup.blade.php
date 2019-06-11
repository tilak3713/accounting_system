@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of Discount Periods</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ url('discount-periods-add')}}" class="btn btn-success pull-right" style="float:right"> Add</a>
        
        <p class="m-0 font-weight-bold text-primary">Discount Periods </p>
    </div>
    
    <div class="card-body">
        <div class="">
            <table class=" table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> Description </th>
                        <th>  Start Date      </th>
                        <th>  End Date</th>
                        <th>  Sales Budget % Over Last</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->description }}</td>
                        <td>{{$row->start_date}}</td>
                        <td>{{$row->end_date}}</td>
                        <td>{{$row->sales_budget}} </td>
                        <td>{{$row->created_at->format('d/m/Y g:i A')}}</td>
                        <td>{{$row->updated_at->format('d/m/Y g:i A')}}</td>
                        <td>
                            <a href="{{url('discount-periods-edit/'.$row->id)}} " title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            
                            <a href="{{url('discount-periods-delete/'.$row->id)}} " title="Delete" class="btn btn-danger btn-sm" onclick="if(confirm('Are u sure want to delete?')) commentDelete(1); return false" ><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')

<!-- DataTales Example -->
 @if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
<h1 class="h3 mb-2 text-gray-800">Contact Details</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<a href="{{url('setups/event/add_event')}}" class="btn btn-success" style="float: right;">Add</button></a>
        <h6 class="m-0 font-weight-bold text-primary">List of Contact Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Event Name</th>
                        <th>Event Date</th>
                       <th>Event Day</th>
                        <th>Event Description</th>
                         <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $result)
                    <tr>    
                        <td>{{$result->event_name}}</td>
                        <td>{{date('d/m/Y',strtotime($result->event_date))}}</td>
                        <td>{{date('D',strtotime($result->event_date))}}</td>
                        <td>{{$result->event_description}}</td>
                        <td>{{$result->created_at->format('d/m/Y g:i A')}}</td>
                        <td>{{$result->updated_at->format('d/m/Y g:i A')}}</td>
                        <td><a href="{{url('setups/event/edit_event',$result->id)}}"><i class="fa fa-edit" title="Edit"></i></a>
                        <a href="{{url('setups/event/delete_event',$result->id)}}" onclick="if(confirm('Are you sure want to delete?')) commentDelete(1); return false"><i class="fa fa-trash" title="Delete" style="color: red";></i></a>
                        </td>   
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()
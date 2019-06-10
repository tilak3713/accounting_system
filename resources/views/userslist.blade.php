@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of users</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users Data Tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email verified at</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email verified at</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($userslist as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->email_verified_at }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                        <a href="{{url('user/profile/view/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{url('user/profile/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        @if ($data->id!==1)
                        <a href="" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        @endif
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>





@endsection

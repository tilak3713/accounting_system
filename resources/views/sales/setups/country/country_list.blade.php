@extends('layouts.app')

@section('content')

<script type="text/javascript">
    function deletion()
    {
        var x = confirm('Do you really want to delete ?');

        if(x)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Country Setup</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Country List</h6>
        <a href="{{ url('setups/country/add') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-plus"></i>Add New</a>
    </div>
    
    <div class="card-body">
        <div class="">
            <table class="table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Country Name</th>
                        <th>Currency Code</th>
                        <th>Currency Symbol</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email verified at</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    @php $i=1; @endphp
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->country_name }}</td>
                        <td>{{ $data->currency_code }}</td>
                        <td>{{ $data->currency_symbol }}</td>
                         <td>
                        @if($data->status==1)

                           <button class="btn btn-sm btn-outline-success"><a href="{{url('setups/country/change_status',$data->id)}}" style="color: black;">Active</a></button>
                        @else

                       <button class="btn btn-sm btn-outline-warning"><a href="{{url('setups/country/change_status',$data->id)}}" style="color: black;">InActive</a></button>
                        @endif
                    </td>
                        <td>{{ date('d M,Y H:i',strtotime($data->created_at)) }}</td>
                        <td>{{ date('d M,Y H:i',strtotime($data->updated_at)) }}</td>
                        <td>
                       <!--  <a href="" title="edit" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> -->
                        <a href="{{url('setups/country/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{url('setups/country/delete/'.$data->id)}}" title="Delete" class="btn btn-danger btn-sm" onclick="return deletion();"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

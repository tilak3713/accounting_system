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
<h1 class="h3 mb-2 text-gray-800">Invoice Item Setup</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invoice Item List</h6>
        <a href="{{ url('sales/invoice-items/add') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Add New</a>
    </div>
   
    <div class="card-body">
        <div class="">
            <table class="table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Item Name</th>
                        <th>Is Tour</th>
                        <th>Exclude From Discounts</th>
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
                    @php $i=1; $chkbox = array('0'=>'No','1'=>'Yes'); @endphp
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->item_name }}</td>
                        <td>{{ $chkbox[$data->is_tour] }}</td>
                        <td>{{ $chkbox[$data->exclude_from_discounts] }}</td>
                        <td>
                        @if($data->status==1)

                           <button class="btn btn-sm btn-outline-success"><a href="{{url('sales/invoice-items/change_status',$data->id)}}" style="color: black;">Active</a></button>
                        @else

                       <button class="btn btn-sm btn-outline-warning"><a href="{{url('sales/invoice-items/change_status',$data->id)}}" style="color: black;">InActive</a></button>
                        @endif
                    </td>
                        <td>{{ date('d M,Y H:i',strtotime($data->created_at)) }}</td>
                        <td>{{ date('d M,Y H:i',strtotime($data->updated_at)) }}</td>
                        <td>
                       <!--  <a href="" title="edit" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> -->
                        <a href="{{url('sales/invoice-items/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{url('sales/invoice-items/delete/'.$data->id)}}" title="Delete" class="btn btn-danger btn-sm" onclick="return deletion();"><i class="fas fa-trash"></i></a>
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

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
<h1 class="h3 mb-2 text-gray-800">Customer Setup</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
        <a href="{{ url('sales/customers/add') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-plus"></i>Add New</a>
    </div>
   
    <div class="card-body">
        <div class="">
            <table class="table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Contact Number</th>
                        <th>Parent Account Related</th>
                        <th>Location</th>
                        <th>Tax Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    @php $i=1; @endphp
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->title.' '.$data->cus_name }}</td>
                        <td>{{ $data->cus_email }}</td>
                        <td>{{ $data->contact_no }}</td>

             
                        <td>
                            @if(isset($parent_acc[$data->parent_acc]))

                            {{ $parent_acc[$data->parent_acc] }}
                            
                            @endif
                        </td>
                        <td>{{ $location_data[$data->location_id_fk] }}</td>

                        

                        <td>
                            @if(isset($tax_type[$data->tax_type_id]))

                            {{ $tax_type[$data->tax_type_id] }}
                            
                            @endif
                        </td>
                        <td>
                       <!--  <a href="" title="edit" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> -->
                        <a href="{{url('sales/customers/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{url('sales/customers/delete/'.$data->id)}}" title="Delete" class="btn btn-danger btn-sm" onclick="return deletion();"><i class="fas fa-trash"></i></a>
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

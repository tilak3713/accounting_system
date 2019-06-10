@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of Account(New) <a href="{{url('account/add-new')}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Add New</a> </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Account Data Tables</h6>

    </div>
    <div class="card-body">
        <div class="">

            <table class="table dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Account name</th>
                        <th>Account group</th>
                        <th>Parent account</th>
                        <th>Advance account</th>
                        <th>Is cash or bank</th>
                        <th>Is customer related</th>
                        <th>All ledger printing</th>
                        <th>Is supplier account</th>
                        <th>Is expense account</th>
                        <th>Status</th>
                        <th>Account additional info</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Account name</th>
                        <th>Account group</th>
                        <th>Parent account</th>
                        <th>Advance account</th>
                        <th>Is cash or bank</th>
                        <th>Is customer related</th>
                        <th>All ledger printing</th>
                        <th>Is supplier account</th>
                        <th>Is expense account</th>
                        <th>Status</th>
                        <th>Account additional info</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>                   
                    {{ $statusClass=$statusURl=$statusname=""}}             

                    @foreach($accounts as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->account_name }}</td>
                        <td>{{ $groupnamelist[$data->account_group] }}</td>
                        <td>{{ $ParentsAccountName[$data->parent_account] }}</td>
                        <td>{{ $data->advance_account }}</td>
                        <td>{!! $func[$data->is_cash_or_bank] !!}</td>
                        <td>{!! $func[$data->is_customer_related] !!}</td>
                        <td>{!! $func[$data->all_ledger_printing] !!}</td>
                        <td>{!! $func[$data->is_supplier_account] !!}</td>
                        <td>{!! $func[$data->is_expense_account] !!}</td>
                        <td>

                            @if($data->status==1)
                            <?php
                            $statusClass = 'btn btn-success btn-sm';
                            $statusURl = url('account/status/');
                            $statusname = 'Active';
                            ?>
                            @else
                            <?php
                            $statusClass = 'btn btn-danger btn-sm';
                            $statusURl = url('account/status/');
                            $statusname = 'In-active';
                            ?>
                            @endif

                            <a class="{{$statusClass}}" href="{{$statusURl.'/'.$data->id}}" title="{{$statusname}}">{{$statusname}}</a>
                        </td>
                        <td>{{ $data->account_additional_info }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <a href="{{url('account/read/'.$data->id)}}" title="Read" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{url('account/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{url('account/delete/'.$data->id)}}" onclick="return confirm('Are sure ?')" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

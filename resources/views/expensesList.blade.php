@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List of Expenses <a href="{{url('expense/add-new')}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Add New</a> </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Expense Data Tables</h6>

    </div>
    <div class="card-body">
        <div class="">

            <table class="table dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cash or Bank A/C</th>
                        <th>Narration</th>
                        <th>Account</th>
                        <th>Tax Rate</th>
                        <th>amount without tax</th>
                        <th>Tax amount</th>
                        <th>amount_with_tax</th>  
                        <th>Updated at</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                   
                    @foreach($expenses as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$cashOrBankAccounts[$data->cash_or_bank_ac]}}</td>
                        <td>{{$data->narration}}</td>
                        <td>{{$expenseAccount[$data->account]}}</td>
                        <td>{{$data->tax_type}}</td>
                        <td>{{$data->amount_without_tax}}</td>
                        <td>{{$data->tax_amount}}</td>
                        <td>{{$data->amount_with_tax}}</td>
                        <td>{{$data->updated_at}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            <a href="{{url('expense/read/'.$data->id)}}" title="Read" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{url('expense/edit/'.$data->id)}}" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{url('expense/delete/'.$data->id)}}" onclick="return confirm('Are sure ?')" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

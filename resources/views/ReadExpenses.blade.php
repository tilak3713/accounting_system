@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Expense  <a href="{{url('expenses/view')}}" class="btn btn-primary btn-sm"> <i class="fas fa-list"></i> View All</a></h1>
<div class="row">
    <div class="col-lg-10">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Expense</div>
            <div class="card-body">
                <form method="POST" action="{{ url('expense/edit/save') }}" name="expense_form">
                    @csrf                  
                    {{Form::hidden('id', $expense[0]->id)}}
                     <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cash or Bank A/c') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::select('cash_or_bank_ac', array(''=>'Please Select')+$cashOrBankAccounts, $expense[0]->cash_or_bank_ac, array('class' => 'form-control', 'readonly'=>'readonly'))}}
                            @if($errors->has('cash_or_bank_ac'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('cash_or_bank_ac') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Narration') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::text('narration', $expense[0]->narration, array('class'=>'form-control', 'readonly'=>'readonly', 'placeholder'=>'Enter Narration.'))}}
                            @if($errors->has('narration'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('narration') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Expenses Account') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::select('account', array(''=>'Please Select')+$expenseAccount, $expense[0]->account, array('class' => 'form-control', 'readonly'=>'readonly'))}}
                            @if($errors->has('account'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('account') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
                        <div class="col-md-6">                           
                            {{Form::text('amount_without_tax', $expense[0]->amount_without_tax, array('class'=>'form-control', 'autocomplete'=>'off', 'readonly'=>'readonly', 'placeholder'=>'Amount', 'id'=>'expense_amount_without_tax'))}}
                            @if($errors->has('amount_without_tax'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('amount_without_tax') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tax Type') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::select('tax_type', array(''=>'Please Select')+$tax_type, $expense[0]->tax_type, array('class' => 'form-control', 'readonly'=>'readonly', 'id'=>'expense_tax_type'))}}
                            @if($errors->has('tax_type'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('tax_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tax amount') }}</label>
                        <div class="col-md-6">                           
                            {{Form::text('tax_amount', $expense[0]->tax_amount, array('class'=>'form-control', 'placeholder'=>'Tax Amount', 'readonly'=>'readonly', 'id'=>'expense_tax_amount'))}}
                            @if($errors->has('tax_amount'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('tax_amount') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Final Amount') }}</label>
                        <div class="col-md-6">                           
                            {{Form::text('amount_with_tax', $expense[0]->amount_with_tax, array('class'=>'form-control', 'placeholder'=>'Final Amount', 'readonly'=>'readonly', 'id'=>'expense_amount_with_tax'))}}
                            @if($errors->has('amount_without_tax'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('amount_with_tax') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" disabled="disabled" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                            <a href="{{url('expense/edit/'.$expense[0]->id)}}" title="Edit" class="btn btn-success" >
                                Edit
                            </a>
                            <a href="{{url('expenses/view')}}" title="cancel" class="btn btn-warning" >
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
    
</div>
@endsection

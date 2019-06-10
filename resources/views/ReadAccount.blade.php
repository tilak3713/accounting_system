@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> <a href="{{url('account/list')}}" class="btn btn-primary btn-sm"> <i class="fas fa-list"></i> View All</a></h1>
<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Account </div>
            <div class="card-body">                
                <form method="POST" action="{{ url('account/new/save') }}">
                    @csrf                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>
                        <div class="col-md-6">
                            <input id="account_name" readonly="readonly" type="text" class="form-control" name="account_name" value="{{ $accounts[0]->account_name }}" autofocus>

                            @error('account_name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Group') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::select('account_group', array(''=>'Please Select')+$accountgroup, $accounts[0]->account_group, array('class' => 'form-control', 'readonly'=>'readonly'))}}
                            @if($errors->has('account_group'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('account_group') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Parent Account') }}</label>
                        <div class="col-md-6"> 
                            {{ Form::select('parent_account', array('0'=>'Please Select')+$ParentsAccount, $accounts[0]->parent_account, array('class' => 'form-control','disabled'=>'disabled'))}}
                            @if($errors->has('parent_account'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('parent_account') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">                              
                                <label class="checkbox-inline">{{ Form::checkbox('is_cash_or_bank', '1', $ReturnTrueFalseBaseOnValue[$accounts[0]->is_cash_or_bank], array('disabled'=>'disabled'))}}  Is cash or bank</label>
                                <label class="checkbox-inline">{{ Form::checkbox('is_customer_related', '1', $ReturnTrueFalseBaseOnValue[$accounts[0]->is_customer_related], array('disabled'=>'disabled'))}}  Is customer related</label>
                                <label class="checkbox-inline">{{ Form::checkbox('all_ledger_printing', '1', $ReturnTrueFalseBaseOnValue[$accounts[0]->all_ledger_printing], array('disabled'=>'disabled'))}}  All ledger printing</label>
                                <label class="checkbox-inline">{{ Form::checkbox('is_supplier_account', '1', $ReturnTrueFalseBaseOnValue[$accounts[0]->is_supplier_account], array('disabled'=>'disabled'))}}  Is supplier account</label>
                                <label class="checkbox-inline">{{ Form::checkbox('is_expense_account', '1', $ReturnTrueFalseBaseOnValue[$accounts[0]->is_expense_account], array('disabled'=>'disabled'))}}  Is expense account</label>
                          </div>
                    </div>
                 <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Additional Info') }}</label>
                        <div class="col-md-6"> 
                            {{Form::textarea('account_additional_info', $accounts[0]->account_additional_info, array('class'=>'form-control', 'placeholder'=>'account additional info', 'disabled'=>'disabled'))}}
                        </div>
                    </div> 
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" disabled="disabled">
                                {{ __('Save') }}
                            </button>
                            <a href="{{url('account/edit/'.$accounts[0]->id)}}" class="btn btn-success" >
                                {{ __('Edit') }}
                            </a>
                            <a href="{{url('account/list')}}" class="btn btn-warning" >
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

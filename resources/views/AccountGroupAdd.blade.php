@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add new <a href="{{url('account-group/list')}}" class="btn btn-primary btn-sm"> <i class="fas fa-list"></i> View All</a></h1>
<div class="row">
    <div class="col-lg-10">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Account Group</div>
            <div class="card-body">
                <form method="POST" action="{{ url('account-group/new/save') }}" name="account_group_form">
                    @csrf                  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>
                        <div class="col-md-6">
                            <input id="group_name" type="text" class="form-control @error('group_name') is-invalid @enderror" name="group_name" value=""  autocomplete="group_name" autofocus>
                            @error('group_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Group type') }}</label>
                        <div class="col-md-6">                            
                            <select id="group_type" class="form-control @error('group_type') is-invalid @enderror" name="group_type"  required autocomplete="group_type" autofocus>
                                <option value="">Select</option>
                                <option value="B">Balance Sheet</option>
                                <option value="p">Profit & Loss</option>
                            </select>
                            @error('group_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
    
</div>
@endsection

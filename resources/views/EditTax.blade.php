@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Tax  <a href="{{url('tax/view')}}" class="btn btn-primary btn-sm"> <i class="fas fa-list"></i> View All</a></h1>
<div class="row">
    <div class="col-lg-10">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Tax</div>
            <div class="card-body">
                <form method="POST" action="{{ url('tax/edit/save') }}" name="tax_form">
                    @csrf      
                    {{Form::hidden('id', $Tax[0]->id)}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tax type code') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::text('tax_type_code', $Tax[0]->tax_type_code, array('class'=>'form-control', 'placeholder'=>'Enter tax type code.'))}}
                            @if($errors->has('tax_type_code'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('tax_type_code') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tax type name') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::text('tax_type_name', $Tax[0]->tax_type_name, array('class'=>'form-control', 'placeholder'=>'Enter tax type name.'))}}
                            @if($errors->has('tax_type_name'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('tax_type_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tax rate %') }}</label>
                        <div class="col-md-6">                           
                            {{ Form::text('tax_rate', $Tax[0]->tax_rate, array('class'=>'form-control', 'placeholder'=>'Enter tax rate.'))}}
                            @if($errors->has('taxt_rate'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('tax_rate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                            <A href="{{url('tax/view')}}" class="btn btn-warning" title="Cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
    
</div>
@endsection

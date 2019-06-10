@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style>strong{color:#f16a6a; font-family: auto;}</style>

<h1 class="h3 mb-2 text-gray-800">Country Setup</h1>

<div class="row">

    <div class="col-md-12 ">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Country Edit
            <a href="{{ url('setups/country') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <div class="card-body">
                {{ Form::open(array('url'=>'/setups/country/edit/'.$data->id))}}
                    @csrf
                    <div class="form-group row">
                        <label for="country_name" class="col-md-4 col-form-label text-md-right"><b>Country Name<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::text('country_name',$data->country_name,['class'=>'form-control']) }}

                             @if ($errors->has('country_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('country_name') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="currency_code" class="col-md-4 col-form-label text-md-right"><b>Currency Code<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::text('currency_code',$data->currency_code,['class'=>'form-control']) }}

                             @if ($errors->has('currency_code'))
                                <span class="help-block">
                                <strong>{{ $errors->first('currency_code') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="currency_symbol" class="col-md-4 col-form-label text-md-right"><b>Currency Symbol<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::text('currency_symbol',$data->currency_symbol,['class'=>'form-control']) }}

                             @if ($errors->has('currency_symbol'))
                                <span class="help-block">
                                <strong>{{ $errors->first('currency_symbol') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4" align="right">
                           {{ Form::submit('submit',array('class'=>'btn btn-success')) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection

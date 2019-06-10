@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style>strong{color:#f16a6a; font-family: auto;}</style>

<h1 class="h3 mb-2 text-gray-800">Invoice Items Setup</h1>

<div class="row">

    <div class="col-md-12 ">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Invoice Items Add
            <a href="{{ url('sales/invoice-items') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <div class="card-body">
                {{ Form::open(array('url'=>'/sales/invoice-items/store'))}}
                    @csrf
                    <div class="form-group row">
                        <label for="item_name" class="col-md-4 col-form-label text-md-right"><b>Item Name<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::text('item_name','',['class'=>'form-control']) }}

                             @if ($errors->has('item_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('item_name') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_tour" class="col-md-4 col-form-label text-md-right"><b>Is Tour<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::checkbox('is_tour','1','',array('style'=>'width:31px;height:36px;')) }}

                             @if ($errors->has('is_tour'))
                                <span class="help-block">
                                <strong>{{ $errors->first('is_tour') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exclude_from_discounts" class="col-md-4 col-form-label text-md-right"><b>Exclude From Discounts<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::checkbox('exclude_from_discounts','1','',array('style'=>'width:31px;height:36px;')) }}

                             @if ($errors->has('exclude_from_discounts'))
                                <span class="help-block">
                                <strong>{{ $errors->first('exclude_from_discounts') }}</strong>
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

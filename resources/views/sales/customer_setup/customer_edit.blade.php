@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style>strong{color:#f16a6a; font-family: auto;}</style>

<h1 class="h3 mb-2 text-gray-800">Customer Setup</h1>

<div class="row">

    <div class="col-md-12 ">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Customer Edit
            <a href="{{ url('sales/customers') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <div class="card-body">
                {{ Form::open(array('url'=>'/sales/customers/edit/'.$data->id))}}
                    @csrf

                    @php
                      
                     $title = array(''=>'Select','Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Miss'=>'Miss','Dr'=>'Dr');

                    @endphp

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right"><b>Salutation<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::select('title',$title,$data->title,['class'=>'form-control']) }}

                             @if ($errors->has('title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cus_name" class="col-md-4 col-form-label text-md-right"><b>Customer Name<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">


                            {{ Form::text('cus_name',$data->cus_name,['class'=>'form-control']) }}

                             @if ($errors->has('cus_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('cus_name') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cus_email" class="col-md-4 col-form-label text-md-right"><b>Customer Email<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">

                            {{ Form::text('cus_email',$data->cus_email,['class'=>'form-control']) }}

                             @if ($errors->has('cus_email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('cus_email') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_no" class="col-md-4 col-form-label text-md-right"><b>Contact Number<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">

                        {{ Form::text('contact_no',$data->contact_no,['class'=>'form-control']) }}

                             @if ($errors->has('contact_no'))
                                <span class="help-block">
                                <strong>{{ $errors->first('contact_no') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="parent_acc" class="col-md-4 col-form-label text-md-right"><b>Parent Account Related<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">

                           

                            {{ Form::select('parent_acc',array(''=>'Please select')+$parent_acc,$data->parent_acc,['class'=>'form-control']) }}

                             @if ($errors->has('parent_acc'))
                                <span class="help-block">
                                <strong>{{ $errors->first('parent_acc') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location_id_fk" class="col-md-4 col-form-label text-md-right"><b>Location<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">

                            {{ Form::select('location_id_fk',$location_data,$data->location_id_fk,['class'=>'form-control']) }}

                             @if ($errors->has('location_id_fk'))
                                <span class="help-block">
                                <strong>{{ $errors->first('location_id_fk') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tax_type_id" class="col-md-4 col-form-label text-md-right"><b>Tax Type<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">

                           

                            {{ Form::select('tax_type_id',array(''=>'Please select')+$tax_type,$data->tax_type_id,['class'=>'form-control']) }}

                             @if ($errors->has('tax_type_id'))
                                <span class="help-block">
                                <strong>{{ $errors->first('tax_type_id') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="additional_info" class="col-md-4 col-form-label text-md-right"><b>Additional Info</b></label>
                        <div class="col-md-6">

                            {{ Form::textarea('additional_info',$data->additional_info,['class'=>'form-control','rows'=>4,'cols'=>4]) }}

                             @if ($errors->has('additional_info'))
                                <span class="help-block">
                                <strong>{{ $errors->first('additional_info') }}</strong>
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

@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Contact Details</h1>
 <div class="row">

    <div class="col-lg-12">
		<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{url('setups/contact/view_contact')}}" class="btn btn-success" style="float: right;">Back</a>
                  <h6 class="m-0 font-weight-bold text-primary">Edit Contact Details</h6>
                </div>
                <div class="card-body">
                 {{Form::open(['method'=>'post', 'url'=>'setups/contact/update_contact/'.$data->id])}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Contact Name')}}</label>
                         <div class="col-md-4">
                           
                            {{Form::text('contact_name',$data->contact_name, ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Contact Name','autocomplete'=>'contact_name','autofocus'=>''])}}

                            @if ($errors->has('contact_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Contact Phone No.')}}</label>
                        <div class="col-md-4">
                           
                            {{Form::text('contact_phone',$data->contact_phone, ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Phone No.','autocomplete'=>'contact_phone','autofocus'=>''])}}

                            @if ($errors->has('contact_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_phone') }}</strong>
                            </span>
                            @endif

                        </div>
                         
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Contact Mobile No.')}}</label>
                         <div class="col-md-4">
                           
                            {{Form::text('contact_mobile',$data->contact_mobile, ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Mobile No.','autocomplete'=>'contact_mobile','autofocus'=>''])}}

                            @if ($errors->has('contact_mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_mobile') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Contact Address')}}</label>
                        <div class="col-md-4">
                           
                            {{Form::textarea('contact_address',$data->contact_address, ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Your full Address.','autocomplete'=>'contact_address','autofocus'=>''])}}

                            @if ($errors->has('contact_address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_address') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                        	<button type="reset" class="btn btn-danger">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="btn btn-primary pull-right">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
               {{Form::close()}}
                </div>
        </div>
    </div>
</div>
@endsection()
@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Event Details</h1>
 <div class="row">

    <div class="col-lg-12">
		<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{url('setups/event/view_event')}}" class="btn btn-success" style="float: right;">Back</a>
                  <h6 class="m-0 font-weight-bold text-primary">Add Event Details</h6>
                </div>
                <div class="card-body">
                 {{Form::open(['method'=>'post', 'url'=>'setups/event/insert_event'])}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Event Date')}}</label>
                         <div class="col-md-4">
                           
                            {{Form::date('event_date','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Contact Name','autocomplete'=>'event_date','autofocus'=>''])}}

                            @if ($errors->has('event_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('event_date') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Event Name')}}</label>
                        <div class="col-md-4">
                           
                            {{Form::text('event_name','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Event Name','autocomplete'=>'event_name','autofocus'=>''])}}

                            @if ($errors->has('event_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('event_name') }}</strong>
                            </span>
                            @endif

                        </div>
                         
                    </div>
                  
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Event Description')}}</label>
                        <div class="col-md-4">
                           
                            {{Form::textarea('event_description','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Write Event Description...','autocomplete'=>'event_description','autofocus'=>''])}}

                            @if ($errors->has('event_description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('event_description') }}</strong>
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
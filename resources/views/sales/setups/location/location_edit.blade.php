@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style>strong{color:#f16a6a; font-family: auto;}</style>

<h1 class="h3 mb-2 text-gray-800">Location Setup</h1>

<div class="row">

    <div class="col-md-12 ">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Location Edit
            <a href="{{ url('setups/location') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <div class="card-body">
                {{ Form::open(array('url'=>'/setups/location/edit/'.$data->id))}}
                    @csrf
                    <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label text-md-right"><b>Location Name<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">
                            {{ Form::text('location_name',$data->location_name,['class'=>'form-control']) }}

                             @if ($errors->has('location_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('location_name') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="region" class="col-md-4 col-form-label text-md-right"><b>Region<span style="color:red;">*</span></b></label>
                        <div class="col-md-6">


                            {{ Form::select('region',$region_data,$data->region,['class'=>'form-control']) }}

                             @if ($errors->has('region'))
                                <span class="help-block">
                                <strong>{{ $errors->first('region') }}</strong>
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

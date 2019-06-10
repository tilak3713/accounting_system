@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style>strong{color:#f16a6a; font-family: auto;}</style>

<h1 class="h3 mb-2 text-gray-800">Category Setup</h1>

<div class="row">

    <div class="col-md-12 ">
        <!-- Default Card Example -->
        <div class="card mb-4">  
            <div class="card-header">Category Edit
            <a href="{{ url('setups/category') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-arrow-left"></i>Back</a>
            </div>

            <div class="card-body">
                {{ Form::open(array('url'=>'/setups/category/edit/'.$data->id))}}
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><b>Category Name</b></label>
                        <div class="col-md-6">
                            {{ Form::text('category_name',$data->category_name,['class'=>'form-control']) }}

                            @if($errors->has('category_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('category_name') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right"><b>Status</b></label>

                        <div class="col-md-6">

                            {{ Form::select('status',array('0'=>'InActive','1'=>'Active'),$data->status,['class'=>'form-control']) }}

                            @if($errors->has('status'))
                                <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
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

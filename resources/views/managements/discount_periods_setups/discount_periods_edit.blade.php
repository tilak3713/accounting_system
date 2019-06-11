@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style type="text/css">
.star{
color:red;
}
strong{    color: #f16a6a;
font-family: auto;

}
</style>
<h1 class="h3 mb-2 text-gray-800">Discount Periods Edit</h1>
<div class="row">

	<div class="col-lg-12">
		<!-- Default Card Example -->
		<div class="card mb-7">
			<div class="card-header">Form</div>
			<div class="card-body">
				<form  action="{{url('discount-periods-update/'.$data->id)}}" method="POST">
					@csrf
					
					<div class="form-group row">
						<label for="Discription" class="col-md-4 col-form-label text-md-right">Discription :<span class="star">*</span> </label>
						<div class="col-md-6">
							<input id="Discription" type="text" class="form-control @error('name') is-invalid @enderror" name="Discription" value="{{$data->description }}"  autofocus>
							@if ($errors->has('Discription'))
							<span class="help-block">
								<strong>{{ $errors->first('Discription') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="Start" class="col-md-4 col-form-label text-md-right">Start Date : <span class="star" >*</span></label>
						<div class="col-md-6">
							<input  id="datepicker1" class="form-control" name="start_date" value="{{$data->start_date}}" autocomplete="start_date"  >
							@if ($errors->has('start_date'))
							<span class="help-block">
								<strong>{{ $errors->first('start_date') }}</strong>
							</span>
							@endif
						</div>
						
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">End Date :<span class="star" >*</span></label>
						<div class="col-md-6">
							<input id="datepicker2" class="form-control @error('name') is-invalid @enderror" name="end_date" value="{{$data->end_date}}"  autocomplete="end_date" autofocus>
							@if ($errors->has('end_date'))
							<span class="help-block">
								<strong>{{ $errors->first('end_date') }}</strong>
							</span>
							@endif
						</div>
						
					</div>
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">Sales Budget % Over Last :</label>
						<div class="col-md-6">
							<input id="sales_budget" type="text" class="form-control @error('name') is-invalid @enderror" name="sales_budget" value="{{$data->sales_budget }}"  autocomplete="name" autofocus>
							@if ($errors->has('sales_budget'))
							<span class="help-block">
								<strong>{{ $errors->first('sales_budget') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
							Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
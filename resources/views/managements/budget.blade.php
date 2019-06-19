@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Company Sales Budget </h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-success pull-right" id="AddBudgetid" style="float:right"><i class="fas fa-plus"></i></button>
        
        <p class="m-0 font-weight-bold text-primary">Budget </p>
    </div>

    <div class="card-body">
        <div class="">
            <table class=" table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Start Date</th>
                        <th> End Date</th>
                        <th> Last Year Budget</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>

                    <tr>
                        <td>aaaaaa</td>
                        <td>aaaaaa </td>
                        <td>aaaaaa</td>
                        <td>aaaaaa</td>
                        <td>aaaaaa</td>
                        <td>
                            <a href="javascript:editbudgetid('22','21','122','12');" title="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            
                            <a href="" title="Delete" class="btn btn-danger btn-sm" onclick="if(confirm('Are u sure want to delete?')) commentDelete(1); return false"   ><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="itemBudgetId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-body">
 {{Form::open(array('url'=>'discount-items-store','id'=>'discount_on_items', 'name'=>'discount_on_items'))}}
           
            <div class="form-group row">

                 {!! htmlspecialchars_decode(Form::label('start_date ','Start Date:<span class="star" >*</span>',array('class' => 'col-md-4 col-form-label text-md-right','id'=>'')))!!}
                <div class="col-md-6">
                   {{ Form::text('start_date','', array('class'=>'form-control', 'id'=>'start_date'))}}
                    @if ($errors->has('start_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('end_date','End Date :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('end_date','', array('class'=>'form-control','id'=>'end_date'))}}
                    @if ($errors->has('end_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('Sales_budget ','Sales Budget  :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('Sales_budget', '', array('class'=>'form-control','id'=>'Sales_budget'))}}
                    @if ($errors->has('Sales_budget'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Sales_budget') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>
        
  <button  class="btn btn-primary pull-right" id="AddBudgetbtn" style="float: right;"> Submit</button>
  <button  class="btn btn-primary pull-right" id="EditBudgetbtn"style="float: right;"> Update</button>

      </div>
{{Form::close()}}
      </div>
    </div>
  </div>

<script type="text/javascript">
    
$(document).ready( function(){
    
    $("#AddBudgetid").click(function(){
   $("#exampleModalLabel").html("Add New Budget");
        $('#start_date').val("");
        $('#end_date').val("");
        $('#Sales_budget').val("");
        $("#AddBudgetbtn").show();
        $("#EditBudgetbtn").hide();
        $("#itemBudgetId").modal('show');
    });

});

function editbudgetid(id,start,end,budget){
          $("#exampleModalLabel").html("Edit info");
          $('#start_date').val(start);
          $('#end_date').val(end);
          $('#Sales_budget').val(budget);
          $("#AddBudgetbtn").hide();
          $("#EditBudgetbtn").show();
          $("#itemBudgetId").modal('show');


}

</script>
@endsection


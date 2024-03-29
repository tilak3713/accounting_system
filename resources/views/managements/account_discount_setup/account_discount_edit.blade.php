@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<style type="text/css">
.star{
        color:red;
      }

strong{   
         color: #f16a6a;
        font-family: auto;
      }
</style>
<h1 class="h3 mb-2 text-gray-800">Account Discount Edit</h1>




<div class="row">
    <div class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-7">
            <div class="card-header">Form</div>

            <div class="card-body">

           {{ Form::open(array('url'=>'acounts-discount-update/'.$get_data_byid->id, 'id'=>'editdiscountaccountId', 'name'=>'adddiscountaccountId') )}}
            <div class="form-group row">
             {!! htmlspecialchars_decode(Form::label('Period','Discount Period :<span class="star">*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                   <div class="col-md-6">
                     
                   {{ Form::select('discount_period', array(''=>'Please select items')+$list,$get_data_byid->discount_period,  array('class'=>'form-control'))
               }}
                    @if ($errors->has('discount_period'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount_period') }}</strong>
                    </span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('account','Account :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::select('account', array(''=>'Select')+$account, $get_data_byid->account_name, array('class'=>'form-control'))}}
                    @if ($errors->has('account'))
                    <span class="help-block">
                        <strong>{{ $errors->first('account') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>

                        
            <div class="form-group row">
                  {!! htmlspecialchars_decode(Form::label('discount','Discount type :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">

                    {!! htmlspecialchars_decode(Form::label('item','Invoice Item',array('class' => 'col-md-4 col-form-label text-md-right')))!!} 

                    {{ Form::radio('discount', '1',true)}}

                    {!! htmlspecialchars_decode(Form::label('slab','Amount Slab',array('class' => 'col-md-4 col-form-label text-md-right')))!!}

                     {{Form::radio('discount', '0','',array('disabled'=>'disabled'))}}

                    @if ($errors->has('discount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
         {{ Form::close()}}
         
            </div>

    
    
   <div class="col-md-12" id="itemtableid">
     <table class=" table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> Item Description</th>
                        <th> Discount Amount</th>
                        <th> Discount Percent</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody id="itemlisttddataid">
          @foreach($discount_list as $value)
              <tr>
                   <td>{{$value->item_description }}</td>
                   <td>{{$value->discount_amount }}</td>
                   <td>{{$value->discount_percent }} </td>
                   <td>{{$value->created_at }}</td>
                   <td>{{$value->updated_at }}</td>
                   <td>
                     <a  href="javascript:editaccountdiscount('{{$value->item_description }}', '{{$value->discount_amount }}','{{$value->discount_percent }}','{{$value->id}}')" class="btn btn-primary btn-sm"  title="edit" > <i class="fas fa-edit"></i></a> 
                       
                       <a href="{{url('discount-item-delete/'.$value->id)}} " title="Delete" onclick="if(confirm('Are u sure want to delete?')) commentDelete(1); return false" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                       
                   </td>
               </tr>
   @endforeach()

                </tbody>
            </table>
            <button type="button" class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#itemsModalId"  title="Add New">Add</button>
   </div>
            
      



        </div>
    </div>

</div>

<div class="modal fade" id="itemsModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                 {!! htmlspecialchars_decode(Form::label('item_description ','Item Description:<span class="star" >*</span>',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">

                   {{ Form::select('item_description', array(''=>'Please select items')+$itmeslist , '', array('class'=>'form-control'))}}


                    @if ($errors->has('item_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_description') }}</strong>
                    </span>
                    @endif
                    
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('discount_amount','Discount Amount :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('discount_amount','', array('class'=>'form-control'))}}
                    @if ($errors->has('discount_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount_amount') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('discount_percent ','Discount Percent  :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('discount_percent', '', array('class'=>'form-control'))}}
                    @if ($errors->has('discount_percent'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount_percent') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>
            <input type="hidden" name="discount_account_id" value="{{ $get_data_byid->id}} " >
              <input type="submit" name="submit" class="btn btn-primary pull-right" style="float: right;">
      </div>
        



{{Form::close()}}

      </div>
    </div>
  </div>



<div class="modal fade" id="itemeditModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Item details</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-body">
 {{Form::open(array('url'=>'discount-items-edit','id'=>'edit_discount_on_items', 'name'=>'discount_on_items'))}}
           
            <div class="form-group row">

                 {!! htmlspecialchars_decode(Form::label('item_description ','Item Description:<span class="star" >*</span>',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">

                   {{ Form::select('item_description', array(''=>'Please select items')+$itmeslist , '', array('class'=>'form-control','id'=>'edit_id_item_description'))}}


                    @if ($errors->has('item_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_description') }}</strong>
                    </span>
                    @endif
                    
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('discount_amount','Discount Amount :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('discount_amount','', array('class'=>'form-control','id'=>'edit_id_discount_amount'))}}
                    @if ($errors->has('discount_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount_amount') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>

            <div class="form-group row">
                 {!! htmlspecialchars_decode(Form::label('discount_percent ','Discount Percent  :<span class="star" >*</span> ',array('class' => 'col-md-4 col-form-label text-md-right')))!!}
                <div class="col-md-6">
                   {{ Form::text('discount_percent', '', array('class'=>'form-control','id'=>'edit_id_discount_percent'))}}
                    @if ($errors->has('discount_percent'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount_percent') }}</strong>
                    </span>
                    @endif
                </div> 
            </div>
            <input type="hidden" name="discount_account_id" value="{{ $get_data_byid->id}} ">
               <input type="hidden" name="discount_item_id" id="discount_item_id" >
              <input type="submit" name="submit" class="btn btn-primary pull-right" style="float: right;">
      </div>
        



{{Form::close()}}

      </div>
    </div>
  </div>

@endsection


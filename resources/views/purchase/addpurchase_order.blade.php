@extends('layouts.app')
@section('content')

<script>
  function add_more(){
    
    var count = $(".social_icon_fields").length;
    var n = count+1;
    var itemcount=count;
    var html = "";
    
    html += '<tr class="social_icon_fields">'+'<td width="33%"><input type="text"  name="items['+itemcount+'][pi_booking_reference]" class="form-control" placeholder="Enter Booking Reference" required></td>'
          
            +'<td width="33%"><input type="text"  name = "items['+itemcount+'][pi_supplier_amount]" class="form-control" placeholder="Enter Supplier Currency Amount" value  = "" /> </td>'
            
            +'<td width="33%"><input type="text"  name = "items['+itemcount+'][pi_amount]" class="form-control" placeholder="Enter Amount" value  = "" /> </td>'
          +'</td>'+'<td class="col-md-2">'+'<button class="btn btn-danger btn-sm" onclick="remove(this);">'+'<i class="fa fa-minus">'+'</i>'+'</button>'+'</td>'+'</tr>';
        $(".social_icon_fields:last").after(html);
        return false;
  }

  function remove(ele){
    $(ele).parent().parent().fadeOut(5000).remove();
  }
</script>
 @if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif

<h1 class="h3 mb-2 text-gray-800">Purchase Order</h1>
 <div class="row">

    <div class="col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{url('purchase/view_purchase_order')}}" class="btn btn-success" style="float: right;">Back</a>
                  <h6 class="m-0 font-weight-bold text-primary">Add New Purchase Order</h6>
                </div>
                <div class="card-body">
                     {{Form::open(['method'=>'post', 'url'=>'purchase/insert_purchase_order'])}}
                <div class="row">
               <div class="col-md-6">   
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Purchase Order')}}</label>
                         <div class="col-md-6">
                            
                            {{Form::text('po_id_fk',$lastId, ['class'=>'form-control','readonly'])}}

                            @if ($errors->has('purchase_order'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('purchase_order') }}</strong>
                            </span>
                            @endif
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Purchase Date')}}</label>
                        <div class="col-md-6">
                           
                            {{Form::date('purchase_date',$ldate = new DateTime('today'), ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Phone No.','autocomplete'=>'contact_phone','autofocus'=>''])}}

                            @if ($errors->has('purchase_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('purchase_date') }}</strong>
                            </span>
                            @endif
                        </div>     
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Supplier Name')}}</label>
                         <div class="col-md-6">
                     
                            {{Form::select('po_supplier_name', array(''=>'Choose Supplier Name')+$supplierlist, '',['class'=>'form-control','required'=>'','autocomplete'=>'po_supplier_name','autofocus'=>''])}}

                            @if ($errors->has('po_supplier_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_supplier_name') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Supplier Currency')}}</label>
                         <div class="col-md-6">
                     
                            {{Form::select('po_supplier_currency', array(''=>'Please select')+$currency_list, '',['class'=>'form-control','required'=>'','autocomplete'=>'po_supplier_currency','autofocus'=>''])}}

                            @if ($errors->has('po_supplier_currency'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_supplier_currency') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
              </div>  
         
               <div class="col-md-6"> 
                 <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Closing Date')}}</label>
                        <div class="col-md-6">
                           
                            {{Form::date('po_closing_date',$ldate = new DateTime('today'), ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Phone No.','autocomplete'=>'po_closing_date','autofocus'=>''])}}

                            @if ($errors->has('po_closing_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_closing_date') }}</strong>
                            </span>
                            @endif
                        </div>     
                    </div>
                <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Exchange USD Rate')}}</label>
                        <div class="col-md-6">
                           
                            {{Form::text('po_ex_usd_rate','1.00', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Exchange Rate','autocomplete'=>'po_ex_usd_rate','autofocus'=>''])}}

                            @if ($errors->has('po_ex_usd_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_ex_usd_rate') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Exchange AUD Rate')}}</label>
                        <div class="col-md-6">
                           
                            {{Form::text('po_ex_aud_rate','1.00', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Exchange Rate','autocomplete'=>'po_ex_aud_rate','autofocus'=>''])}}

                            @if ($errors->has('po_ex_aud_rate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_ex_aud_rate') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Narration')}}</label>
                        <div class="col-md-6">
                           
                            {{Form::text('po_narration','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Narration','autocomplete'=>'po_narration','autofocus'=>''])}}

                            @if ($errors->has('po_narration'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('po_narration') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
               </div>
        </div>
      
        <div class="card-header py-3">
                    
                  <h6 class="m-0 font-weight-bold text-primary">Add New Purchase item for Purchase Order No: {{'THO-'.$lastId}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>                        
                        <th>Booking Reference</th>
                        <th>Amount (Supplier Currency)</th>
                        <th>Amount (AUD)</th>
                        <th></th>
                                                                
                    </tr>
                </thead> 
                    <tbody>
                        <tr class="social_icon_fields">
                            <td>{{Form::text('items[0][pi_booking_reference]','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Booking Reference','autocomplete'=>'pi_booking_reference','autofocus'=>''])}}
                            
                            @if ($errors->has('pi_booking_reference'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pi_booking_reference') }}</strong>
                            </span>
                            @endif
                            </td>

                            <td>{{Form::text('items[0][pi_supplier_amount]','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Supplier Currency Amount','autocomplete'=>'pi_supplier_amount','autofocus'=>''])}}
                            
                            @if ($errors->has('pi_supplier_amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pi_supplier_amount') }}</strong>
                            </span>
                            @endif
                            </td>

                            <td>{{Form::text('items[0][pi_amount]','', ['class'=>'form-control', 'required'=>'','placeholder'=>'Enter Amount','autocomplete'=>'po_amount','autofocus'=>''])}}
                            
                            @if ($errors->has('pi_amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pi_amount') }}</strong>
                            </span>
                            @endif
                            </td>
                            <td><input type="button" class="btn btn-primary" onclick="add_more()" value="Add More +"></td>
                        </tr>
                    </tbody>
                </table>
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
@endsection()
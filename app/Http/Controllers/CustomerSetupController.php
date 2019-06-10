<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationSetupModel;
use App\CustomerSetupModel;
use App\AccountModel;
use App\TaxModel;

class CustomerSetupController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }

//-----------------------------------------------------------------------------------------//

    public function index()
    {
         $tax_type = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
    	$location_data = LocationSetupModel::all()->pluck('location_name','id');
    	$parent_acc = AccountModel::where('is_customer_related', '1')->pluck('account_name', 'id')->toArray();
    	return view('sales/customer_setup/customer_add',compact('location_data', 'parent_acc', 'tax_type'));
    }

//-----------------------------------------------------------------------------------------//

    public function store(Request $request)
    { 
    	
    	$this->validate($request,[

           'title' => 'required',
           'cus_name' => 'required',
           'cus_email' => 'required',
           'contact_no' => 'required',
           'parent_acc' => 'required',
           'location_id_fk' => 'required',
           'tax_type_id' => 'required',
    	],[

           'title.required' => 'Select a title',
           'cus_name.required' => 'Customer Name is required',
           'cus_email.required' => 'Customer Email is required',
           'contact_no.required' => 'Enter 10 digit contact no.',
           'parent_acc.required' => 'Select a Parent Account',
           'location_id_fk.required' => 'Location is required',
           'tax_type_id.required' => 'Select Tax Type',
    	]);

    	$customer = new CustomerSetupModel;
    	$customer->title = $request->title;
    	$customer->cus_name = $request->cus_name;
    	$customer->cus_email = $request->cus_email;
    	$customer->contact_no = $request->contact_no;
    	$customer->parent_acc = $request->parent_acc;
    	$customer->location_id_fk = $request->location_id_fk;
    	$customer->tax_type_id = $request->tax_type_id;
    	$customer->additional_info = $request->additional_info;

    	if($customer->save())
    	{
         return redirect('sales/customers')->with('success','Customers details added successfully');
    	}
    	else
    	{
         return redirect('sales/customers')->with('error','Failed to add customers');
    	}
    	
    }

//-----------------------------------------------------------------------------------------//

    public function show()
    {
      $datas = CustomerSetupModel::all();
$tax_type = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
      $location_data = LocationSetupModel::all()->pluck('location_name','id');
      $parent_acc = AccountModel::where('is_customer_related', '1')->pluck('account_name', 'id')->toArray();
      return view('sales/customer_setup/customer_list',compact('datas','location_data', 'parent_acc', 'tax_type'));	
    }

//------------------------------------------------------------------------------------------//


    public function delete($id)
    {
      $customer = CustomerSetupModel::find($id);

      if($customer->delete())
      {
        return redirect('sales/customers')->with('success','Customer deleted successfully');
      }
      else
      {
        return redirect('sales/customers')->with('error','Failed to delete customer');
      }
    }


//---------------------------------------------------------------------------------------------//

    public function edit($id)
    {
         $tax_type = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
    	$data = CustomerSetupModel::find($id);
    	$location_data = LocationSetupModel::all()->pluck('location_name','id');
        $parent_acc = AccountModel::where('is_customer_related', '1')->pluck('account_name', 'id')->toArray();
    	return view('sales/customer_setup/customer_edit',compact('data','location_data', 'parent_acc', 'tax_type'));
    }


//-----------------------------------------------------------------------------------------//

    public function update(Request $request,$id)
    {
    	$this->validate($request,[

           'title' => 'required',
           'cus_name' => 'required',
           'cus_email' => 'required',
           'contact_no' => 'required',
           'parent_acc' => 'required',
           'location_id_fk' => 'required',
           'tax_type_id' => 'required',
    	],
    	[

          'title.required' => 'Select a title',
          'cus_name.required' => 'Customer Name is required',
          'cus_email.required' => 'Customer Email is required',
          'contact_no.required' => 'Enter 10 digit contact no.',
          'parent_acc.required' => 'select a Parent Account',
          'location_id_fk.required' => 'Location is required',
          'tax_type_id.required' => 'Select Tax Type',

    	]);

    	$customer = CustomerSetupModel::find($id);
    	$customer->title = $request->title;
    	$customer->cus_name = $request->cus_name;
    	$customer->cus_email = $request->cus_email;
    	$customer->contact_no = $request->contact_no;
    	$customer->parent_acc = $request->parent_acc;
    	$customer->location_id_fk = $request->location_id_fk;
    	$customer->tax_type_id = $request->tax_type_id;
    	$customer->additional_info = $request->additional_info;

    	if($customer->save())
    	{
          return redirect('sales/customers')->with('success','Customer details updated successfully');
    	}
    	else
    	{
          return redirect('sales/customers')->with('error','Failed to update customer details');
    	}
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountrySetupModel;

class CountrySetupController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

//-------------------------------------------------------------------------------------------//

    public function index()
    {
    	return view('sales/setups/country/country_add');
    }

//-------------------------------------------------------------------------------------------//    

    public function store(Request $request)
    {  

         $this->validate($request,[
             
             'country_name' => 'required',
             'currency_code' => 'required',
             'currency_symbol' => 'required',
         ],[
             'country_name.required' => 'Enter the Country Name',
             'currency_code.required' => 'Enter the Currency Code',
             'currency_symbol.required' => 'Enter the Currency Symbol',

         ]);

         $currency = new CountrySetupModel;
         $currency->country_name = $request->country_name;
         $currency->currency_code = $request->currency_code;
         $currency->currency_symbol = $request->currency_symbol;

         if($currency->save())
         {
         	return redirect('setups/country')->with('success','Country Details successfully added.');
         }
         else
         {
         	return redirect('setups/country')->with('error','Failed to Add Country Details.');
         }
    }

//-----------------------------------------------------------------------------------------------//

    public function show()
    {
    	$datas = CountrySetupModel::all();
    	return view('sales/setups/country/country_list',compact('datas'));
    }

//-----------------------------------------------------------------------------------------------//

    public function delete($id)
    {
    	$country = CountrySetupModel::find($id);

    	if($country->delete())
    	{
    		return redirect('setups/country')->with('success','Country Details deleted successfully');
    	}
    	else
    	{
    		return redirect('setups/country')->with('error','Failed to delete Country Details');
    	}
    }

//---------------------------------------------------------------------------------------------//

    public function edit($id)
    {
    	$data = CountrySetupModel::find($id);

    	return view('sales/setups/country/country_edit',compact('data'));
    }

//---------------------------------------------------------------------------------------------//

    public function update(Request $request,$id)
    {

    	$this->validate($request,[
             
             'country_name' => 'required',
             'currency_code' => 'required',
             'currency_symbol' => 'required',
         ],[
             'country_name.required' => 'Enter the Country Name',
             'currency_code.required' => 'Enter the Currency Code',
             'currency_symbol.required' => 'Enter the Currency Symbol',

         ]);

         $currency = CountrySetupModel::find($id);
         $currency->country_name = $request->country_name;
         $currency->currency_code = $request->currency_code;
         $currency->currency_symbol = $request->currency_symbol;

         if($currency->save())
         {
         	return redirect('setups/country')->with('success','Country Details successfully updated.');
         }
         else
         {
         	return redirect('setups/country')->with('error','Failed to update Country Details.');
         }
    }

//---------------------------------------------------------------------------------------------//

    public function change_status($id)
    {
        $currency = CountrySetupModel::find($id);

        if($currency->status==0)
        {
           $currency->status = 1; 
        }
        else
        {
            $currency->status = 0;
        }

        if($currency->save())
        {
          return redirect('setups/country')->with('success','Status changed successfully');  
        }
    }
}

//---------------------------------------------------------------------------------------------//
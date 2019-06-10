<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegionSetupModel;
use App\LocationSetupModel;

class LocationSetupController extends Controller
{   
	private $region_var = array();
    
    public function __construct()
    {  
    	$this->middleware('auth');
    	
    	$region_data = RegionSetupModel::all()->pluck('region_name','id');

      $this->region_var = $region_data;
    }

//-----------------------------------------------------------------------------------------------//

    public function index()
    {   
        $region_data = RegionSetupModel::all()->pluck('region_name','id');
        
    	return view('sales/setups/location/location_add',compact('region_data'));
    	
    }

//----------------------------------------------------------------------------------------------//

    public function store(Request $request)
    {
       $this->validate($request,[

          'location_name' => 'required',
          'region' => 'required',
       ],

       [
          'location_name.required' => 'Enter the Location',
          'region.required' => 'Select the Region',

       ]);

       $location = new LocationSetupModel;
       $location->location_name = $request->location_name;
       $location->region = $request->region;

       if($location->save())
       {
       	    return redirect('setups/location')->with('success','Location added successfully');
       }
       else
       	{
       		return redirect('setups/location')->with('error','Failed to add location');
       	}
    }

//---------------------------------------------------------------------------------------------//

    public function show()
    {
    	$datas = LocationSetupModel::all();
      $region_list = $this->region_var;

    	return view('sales/setups/location/location_list',compact('datas','region_list'));

    }

//----------------------------------------------------------------------------------------------//

    public function delete($id)
    {
    	$location = LocationSetupModel::find($id);
    	if($location->delete())
    	{
    		return redirect('setups/location')->with('success','Location deleted successfully');
    	}
    	else
    	{
    		return redirect('setups/location')->with('error','Failed to delete Location');
    	}
    }


//--------------------------------------------------------------------------------------------//

    public function edit($id)
    {
       $data = LocationSetupModel::find($id);

       $region_data = RegionSetupModel::all()->pluck('region_name','id');

       return view('sales/setups/location/location_edit',compact('data','region_data'));
    }


//--------------------------------------------------------------------------------------------//


    public function update(Request $request,$id)
    {
       $this->validate($request,[

         'location_name' => 'required',
         'region' => 'required',
       ],

       [
         'location_name.required' => 'Location Name is required',
         'region.required' => 'Select the region',
       ]);


       $location = LocationSetupModel::find($id);
       $location->location_name = $request->location_name;
       $location->region = $request->region;

       if($location->save())
       {
       	return redirect('setups/location')->with('success','succesfully updated the location');
       }
       else
       {
       	return redirect('setups/location')->with('error','Failed to update the location');
       }
    }

//---------------------------------------------------------------------------------------------//

    public function change_status($id)
    {
      $location = LocationSetupModel::find($id);

      if($location->status == 0)
      {
        $location->status = 1;
      }
      else
      {
        $location->status = 0;
      }

      if($location->save())
      {
        return redirect('setups/location')->with('success','Status changed successfully');
      }
    }
}

//---------------------------------------------------------------------------------------------//
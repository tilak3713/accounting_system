<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegionSetupModel;

class RegionSetupController extends Controller
{
   public function __construct()
   { 
     $this->middleware('auth');
   }

//--------------------------------------------------------------------------------------//

   public function index()
   {
   	 return view('sales/setups/region/region_add');
   }

//--------------------------------------------------------------------------------------//
   
   public function store(Request $request)
   {
      $this->validate($request,[
         
         'region_name' => 'required',
      ],[
          'region_name.required' => 'Enter the Region Name',

      ]);

       $region = new RegionSetupModel;
       $region->region_name = $request->region_name;

       if($region->save())
       {
       	 return redirect('setups/region')->with('success','Region Added successfully');
       }
       else
       {
       	 return redirect('setups/region')->with('error','Failed to Add Region');
       }
   }

//-------------------------------------------------------------------------------------------//

   public function show()
   {
   	 $datas = RegionSetupModel::all();

   	 return view('sales/setups/region/region_list',compact('datas'));
   }

//--------------------------------------------------------------------------------------------//

   public function delete($id)
   {
   	 $region = RegionSetupModel::find($id);

   	 if($region->delete())
   	 {
   	 	return redirect('setups/region')->with('success','Region deleted successfully ');
   	 }
   	 else
   	 {
   	 	return redirect('setups/region')->with('error','Failed to delete Region');
   	 }

   }

//---------------------------------------------------------------------------------------------//

   public function edit($id)
   {
   	  $data = RegionSetupModel::find($id);

   	  return view('sales/setups/region/region_edit',compact('data'));
   }

//--------------------------------------------------------------------------------------------//

   public function update(Request $request,$id)
   {
   	 $this->validate($request,[

        'region_name' => 'required',
   	 ],[

        'region_name.required' => 'Enter the Region',
   	 ]);

   	 $region = RegionSetupModel::find($id);
   	 $region->region_name = $request->region_name;

   	 if($region->save())
   	 {
   	 	return redirect('setups/region')->with('success','Successfully updated Region');
   	 }
   	 else
   	 {
   	 	return redirect('setups/region')->with('error','Failed to update Region');
   	 }
   }

//---------------------------------------------------------------------------------------------//

   public function change_status($id)
   {
     $region = RegionSetupModel::find($id);

     if($region->status == 0)
     {
       $region->status = 1;
     }
     else
     {
       $region->status = 0;
     }

     if($region->save())
     {
       return redirect('setups/region')->with('success','Successfully changed Status');
     }
   }
}

//---------------------------------------------------------------------------------------------//
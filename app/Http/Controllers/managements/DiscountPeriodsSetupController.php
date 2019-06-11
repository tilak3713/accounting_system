<?php

namespace App\Http\Controllers\managements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discount_Periods_Setup;

class DiscountPeriodsSetupController extends Controller
{
		   public function __construct()
			{
				$this->middleware('auth');
			}



	       public function index()
		    {
		    	$data = Discount_Periods_Setup::get();
		    	return view('managements/discount_periods_setups/Discount_Periods_Setup',compact('data'));
		    }



	     public function discount_add()
		    {
		    return view('managements/discount_periods_setups/discount_periods_add');
		    }


		  public function discount_store(Request $request)
		    {             
	            $this->validate($request,
	            	[  
	                       'Discription'=> 'required',
	                       'start_date'=>'required',
	                       'end_date'=>'required',
	                       // 'sales_budget'=>'required',
	                ],

	                [
	                    'Discription.required'=>'enter value',
	                ]);

	                      $save= new Discount_Periods_Setup;
	                       $save->description = $request->Discription;
	                       $save->start_date  = $request->start_date;
	                       $save->end_date    = $request->end_date;
	                       $save->sales_budget=  $request->sales_budget;
	    
	           if($save->save())
	           {
	           	 return redirect('discount-Periods-Setup')->with('success','Successfully Added Discount Periods');
	            }
            }

	     public function discount_edit($id)
	        {
	           $data = Discount_Periods_Setup::find($id);
	           return view('managements/discount_periods_setups/discount_periods_edit',compact('data'));
	        }


	     public function discount_update(Request $request, $id)
	        {
	                 $this->validate($request,
	                 	[  
	                      'Discription'=> 'required',
	                       'start_date'=>'required',
	                       'end_date'=>'required',
	                       // 'sales_budget'=>'required',
		                 ],
		                 [
		                    'Discription.required'=>'enter value',
		                 ]);

		                      $save= Discount_Periods_Setup::find($id);
		                       $save->description = $request->Discription;
		                       $save->start_date  = $request->start_date;
		                       $save->end_date    = $request->end_date;
		                       $save->sales_budget=  $request->sales_budget;
		    
		             if($save->save())
		              {
		           	      return redirect('discount-Periods-Setup')->with('success','Updated Discount Periods');
		               }
	        	
	        }


	     public function discount_delete($id)
	        {
	        	$result=Discount_Periods_Setup::find($id)->delete();
	        	if($result)
	        	{
	        		 return redirect('discount-Periods-Setup')->with('success',' Deleted Discount Periods');
	        	}
	        }

         
 
}

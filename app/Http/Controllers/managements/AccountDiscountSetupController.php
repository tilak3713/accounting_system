<?php

namespace App\Http\Controllers\managements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discount_Periods_Setup;
use App\acounts_discount_store;
use App\Items;
use App\Discount_items;
use DB;
use App\AccountModel;

class AccountDiscountSetupController extends Controller
{
    	public function __construct()
			{
				$this->middleware('auth');
			}



	    public function index()
		    {
                
                       

		           $list=acounts_discount_store::get();
                        
		    	return view('managements/account_discount_setup/account_discount_setup',compact('list'));
		    }
	//-----------------------------------------------------------------------------------------------------

		public function discount_add()
		    {
		    	$itmeslist=Items::get()->pluck('item_name','id')->toArray();  
 $account = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();

		            $list=Discount_Periods_Setup::All()->pluck('description','id')->toArray();


		    	return view('managements/account_discount_setup/account_discount_add',compact('list', 'itmeslist', 'account'));
		    }

//------------------------------------------------------------------------------ ---------------------------------   

		public function discount_store(Request $request)
		    {
		        
		    
		    	$discount_period = $request->discount_period;
		    	$account_name = $request->account;
		    	$discount_type = $request->discount;
                
                $result= DB::table('accounts_discount')->select('id')->where([
                	['discount_period','=',$discount_period],
                	['account_name','=',$account_name],
                	['discount_type','=',$discount_type],
                ])->get()->toArray();

                if(empty($result)){
                		$rec = new acounts_discount_store;
		               	$rec->discount_period = $request->discount_period;
				    	$rec->account_name = $request->account;
				    	$rec->discount_type = $request->discount;

				    	if($rec->save()){
							echo $rec->id;
				    	}else{
				    		echo 'not inserted';
				    	}

                  }

                else{
                	
                	echo $result[0]->id;

                    }
               
    
		    }




// ----------------------------------------------------------------------------------

		  public function discount_update(Request $request,$id)
		    {
		        
                		$rec = acounts_discount_store::find($id);
		               	$rec->discount_period = $request->discount_period;
				    	$rec->account_name = $request->account;
				    	$rec->discount_type = $request->discount;

				    	if($rec->save()){
						
                     return redirect('account-discount-edit/'.$id)->with('success',' Update Discount account'); 


				    	}
				    	else{
				    		echo 'not inserted';
				    	    }

                  }

               
    
		    

//--------------------------------------------------------------------------------------------

		public function discount_items_store(Request $request)
		    {
		        
		    	$rec = new discount_items;
		    	$rec->item_description = $request->item_description;
		    	$rec->discount_amount = $request->discount_amount;
		    	$rec->discount_percent = $request->discount_percent;
		    	$rec->account_discount_id = $request->discount_account_id;
		    
		    	if($rec->save()){
				echo $request->discount_account_id;
		    	}else{
		    		echo 'not inserted';
		    	}
		    }

/*
		   private function getitems($id=null){
                           
             if(!empty($id)){

             	$items= Discount_items::where('account_discount_id',$id)->get()->toArray();

             	return response()->json($items);


             }



		   }*/


		   public function list_of_discount_items(Request $request){
		   	$items= Discount_items::where('account_discount_id',$request->id)->get()->toArray();

             	return response()->json($items);

		   }

//--------------------------------------------------------------------------------------------------------------------------

		   public function account_delete($id)
		   {

		   	$result=acounts_discount_store::find($id)->delete();
		   	$result_items=discount_items::where('account_discount_id',$id)->delete();
             
             if($result and $result_items ){
             	return redirect('acounts-discount-setup')->with('success',' Deleted Discount account with Items');
             }

//--------------------------------------------------------------------------------------------------------------------------

		   }

		   public function discount_item_delete($id)
	        {
	        	$result_items=discount_items::find($id)->delete();
	        	if($result_items)
	        	{
	        		 return redirect('')->with('success',' Deleted Discount Periods');
	        	}
	        }

//--------------------------------------------------------------------------------------------------------------------------


	        public function account_edit($id)
	        {

                      $get_data_byid=acounts_discount_store::find($id);

	        		$itmeslist=Items::get()->pluck('item_name','id')->toArray();  

	        	        $list=Discount_Periods_Setup::All()->pluck('description','id')->toArray();
                         $account = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();

                         $discount_list= discount_items::where('account_discount_id', $id)->get();

	        		return view('managements/account_discount_setup/account_discount_edit',compact('list', 'itmeslist','get_data_byid','discount_list', 'account'));

	        }

//--------------------------------------------------------------------------------------------------------------------------











}

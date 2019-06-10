<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategorySetupModel;

class CategorySetupController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

//---------------------------------------------------------------------------------------------//

    public function index()
    {
    	return view('sales/setups/category/category_setup');
    }

//---------------------------------------------------------------------------------------------//

    public function store(Request $request)
    {  
    	$this->validate($request,[
    		'category_name' => 'required',
    		'status' => 'required',
    	],[
           'category_name.required' => 'Enter the Category',
           'status.required' => 'Select Status',
    	]);

       $category = new CategorySetupModel;
       $category->category_name = $request->category_name;
       $category->status = $request->status;

       if($category->save())
       {
       	 return redirect('setups/category')->with('success','Category Added Successfully');
       }
       else
       {
       	return redirect('setups/category')->with('error','Failed to Add Category');
       }
    }

//----------------------------------------------------------------------------------------------//

    public function show()
    {
    	$datas = CategorySetupModel::all();
    	return view('sales/setups/category/category_list',compact('datas'));
    }

    public function delete($id)
    {
    	$category = CategorySetupModel::find($id);
    	if($category->delete())
    	{
    	return redirect('/setups/category')->with('success','Category Deleted Successfully');
        }
        else 
        {
        	return redirect('/setups/category')->with('error','Failed to Delete Category');
        }
    }

//---------------------------------------------------------------------------------------------//

    public function edit($id)
    {
    	$data = CategorySetupModel::find($id);
    	return view('sales/setups/category/category_edit',compact('data'));
    }

//-----------------------------------------------------------------------------------------------//

    public function update(Request $request,$id)
    {  
    	$this->validate($request,[
           'category_name' => 'required',
           'status' => 'required',
    	],[
           'category_name.required' => 'Enter the Category',
           'status.required' => 'Select Category',
    	]);

       $category = CategorySetupModel::find($id);
       $category->category_name = $request->category_name;
       $category->status = $request->status;

       if($category->save())
       {
       	return redirect('setups/category')->with('success','Category Updated Successfully');
       }
       else
       {
       	return redirect('setups/category')->with('error','Failed to update Category');
       }
    }

//-------------------------------------------------------------------------------------------//

    public function change_status($id)
    {
      $category = CategorySetupModel::find($id);

      if($category->status == 0)
      {
        $category->status = 1;
      }
      else
      {
        $category->status = 0;
      }

      if($category->save())
      {
        return redirect('setups/category')->with('success','Status changed successfully');
      }
    }

   
}

//---------------------------------------------------------------------------------------------//
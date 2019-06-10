<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class ContactController extends Controller
{
    public function add_contact()
    {
    	return view('setups/contact/addcontact');
    }

    public function insert_contact(Request $request)
    {
    	$data = new ContactModel();
    	$data->contact_name = $request->contact_name;
    	$data->contact_phone = $request->contact_phone;
    	$data->contact_mobile = $request->contact_mobile;
    	$data->contact_address = $request->contact_address;
    	if ($data->save())
    	{
    		return redirect('setups/contact/view_contact')->with('msg',"Contact Details Insert Successfully");
    	}
    }

    public function view_contact()
    {
    	 $data = ContactModel::orderBy('id','desc')->get();
        return view('setups/contact/viewcontact',compact('data'));
    }

    public function delete_contact($id)
    {
        $result = ContactModel::find($id);
        $result->delete();
        return redirect('setups/contact/view_contact')->with('msg',"Contact Details Delete Successfully");
    }

    public function edit_contact($id)
    {
       $data = ContactModel::find($id);
       return view('setups/contact/editcontact',compact('data')); 
    }

    public function update_contact(Request $request, $id)
    {
        $result = ContactModel::find($id);
        $result->contact_name = $request->contact_name;
        $result->contact_phone = $request->contact_phone;
        $result->contact_mobile = $request->contact_mobile;
        $result->contact_address = $request->contact_address;
        if ($result->save())
        {
            return redirect('setups/contact/view_contact')->with('msg',"Details Update Successfully");
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventModel;

class EventController extends Controller
{
    public function add_event()
    {
    	return view('setups/event/addevent');
    }

    public function insert_event(Request $request)
    {
    	$data = new EventModel();
    	$data->event_date = $request->event_date;
    	$data->event_name = $request->event_name;
    	$data->event_description = $request->event_description;
    	if ($data->save())
    	{
    		return redirect('setups/event/view_event')->with('msg',"Event Insert Successfully");
    	}
    }

    public function view_event()
    {
    	$data = EventModel::orderBy('id','desc')->get();
    	return view('setups/event/viewevent',compact('data'));
    }

    public function delete_event($id)
    {
    	$result = EventModel::find($id);
    	$result->delete();
    	return redirect('setups/event/view_event')->with('msg',"Event Delete Successfully");
    }

    public function edit_event($id)
    {
    	$data = EventModel::find($id);
       	return view('setups/event/editevent',compact('data')); 
    }

    public function update_event(Request $request, $id)
    {
    	$result = EventModel::find($id);
    	$result->event_date = $request->event_date;
    	$result->event_name = $request->event_name;
    	$result->event_description = $request->event_description;
    	if ($result->save())
    	{
    		return redirect('setups/event/view_event')->with('msg',"Event Update Successfully");
    	}
    }
}

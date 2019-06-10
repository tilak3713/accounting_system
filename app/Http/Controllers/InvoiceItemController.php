<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceItemModel;

class InvoiceItemController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }

//-------------------------------------------------------------------------------------------//

    public function index()
    {
    	return view('sales/invoice_items/invoice_items_add');
    }

//-------------------------------------------------------------------------------------------//

    public function store(Request $request)
    {
    	$this->validate($request,[

          'item_name' => 'required',
        ],
        [
           'item_name.required' => 'Item Name is required',

        ]);

        $invoice_item = new InvoiceItemModel;
        $invoice_item->item_name = $request->item_name;
        if(!empty($request->is_tour)){
        $invoice_item->is_tour = $request->is_tour;
       }
       if(!empty($request->exclude_from_discounts)){
        $invoice_item->exclude_from_discounts = $request->exclude_from_discounts;

       }

        if($invoice_item->save())
        {
         return redirect('sales/invoice-items')->with('success','Invoice Item sucessfully added');
        }
        else
        {
         return redirect('sales/invoice-items')->with('error','Failed to add Invoice Item');
        }
    }


//----------------------------------------------------------------------------------------------//


    public function show()
    {
        $datas = InvoiceItemModel::all();

        return view('sales/invoice_items/invoice_items_list',compact('datas'));
    }


//--------------------------------------------------------------------------------------------//

    public function delete($id)
    {
        $invoice_item = InvoiceItemModel::find($id);
        if($invoice_item->delete())
        {
          return redirect('sales/invoice-items')->with('success','Invoice Item Deleted'); 
        }
        else
        {
          return redirect('sales/invoice-items')->with('error','Failed to delete Invoice Item');
        }
    }

//---------------------------------------------------------------------------------------------//

    public function edit($id)
    {
        $data = InvoiceItemModel::find($id);

        return view('sales/invoice_items/invoice_items_edit',compact('data'));
    }

//---------------------------------------------------------------------------------------------//

    public function update(Request $request,$id)
    {
       $this->validate($request,[

        'item_name' => 'required', 
       ],
       [

         'item_name.required' => 'Item Name is required',
       ]);

       $invoice_item = InvoiceItemModel::find($id);
       $invoice_item->item_name = $request->item_name;
       if(!empty($request->is_tour)){
        $invoice_item->is_tour = $request->is_tour;
       }else{
        $invoice_item->is_tour='0';
       }
       if(!empty($request->exclude_from_discounts)){
        $invoice_item->exclude_from_discounts = $request->exclude_from_discounts;

       }
       else
       {
        $invoice_item->exclude_from_discounts = '0';
       }
       
       if($invoice_item->save())
       {
        return redirect('sales/invoice-items')->with('success','Invoice Item updated');
       }
       else
       {
        return redirect('sales/invoice-items')->with('error','Failed to update Invoice Item');
       }
    }


//--------------------------------------------------------------------------------------------//


    public function change_status($id)
    {
        $invoice_item = InvoiceItemModel::find($id);

        if($invoice_item->status==0)
        {
            $invoice_item->status = 1;
        }

        else
        {
            $invoice_item->status = 0;
        }

        if($invoice_item->save())
        {
          return redirect('sales/invoice-items')->with('success','status successfully updated');  
        }
    }


}

//-----------------------------------------------------------------------------------------------//
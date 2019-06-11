<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseorderModel;
use App\PurchaseitemModel;
use App\AccountModel;
use App\CountrySetupModel;

class PurchaseController extends Controller
{
    public function add_purchase_order()
    {
       $supplierlist = AccountModel::where('is_supplier_account', '1')->pluck('account_name', 'id')->toArray();

       $currency_list = CountrySetupModel::all()->pluck('currency_code', 'id')->toArray();
               
        $data = PurchaseorderModel::orderBy('id','desc')->take(1)->get();
        $lastId=$data[0]->id+1;
        return view('purchase/addpurchase_order',compact('lastId', 'supplierlist','currency_list'));
    }

    public function insert_purchase_order(Request $request)
    {
        //dd($request->items);
        $data = new PurchaseorderModel();
        $data->purchase_date = $request->purchase_date;
        $data->po_supplier_name = $request->po_supplier_name;
        $data->po_supplier_currency = $request->po_supplier_currency;
        $data->po_closing_date = $request->po_closing_date;
        $data->po_ex_usd_rate = $request->po_ex_usd_rate;
        $data->po_ex_aud_rate = $request->po_ex_aud_rate;
        $data->po_narration = $request->po_narration;
        
        if($data->save())
        {
            $items = $request->input('items');

            foreach ($items as $item)
            {
                $itemss = new PurchaseitemModel();
                $itemss->po_id_fk = $request->po_id_fk;  
                $itemss->pi_booking_reference = $item['pi_booking_reference'];
                $itemss->pi_supplier_amount = $item['pi_supplier_amount'];
                
                $itemss->pi_amount = $item['pi_amount'];
                $itemss->save();
            }
        return redirect('purchase/view_purchase_order')->with('msg',"Purchase Order Insert Successfully");
        }else
        {
            return redirect('purchase/add_purchase_order')->with('danger',"Error! Try Again");
        }
            
    }

    public function view_purchase_order()
    {
        
            $supplierlist = AccountModel::where('is_supplier_account', '1')->pluck('account_name', 'id')->toArray();


        $data = PurchaseorderModel::join('purchase_item','purchase_order.id','=','purchase_item.po_id_fk')
        ->select('purchase_order.po_closing_date','purchase_order.purchase_date','purchase_order.id','purchase_order.created_at','purchase_order.updated_at','purchase_order.po_supplier_name','purchase_order.po_supplier_currency','purchase_order.po_closing_date','purchase_order.po_ex_usd_rate','purchase_order.po_ex_aud_rate','purchase_order.po_narration','purchase_item.pi_booking_reference','purchase_item.pi_supplier_amount')
        
        ->orderBy('purchase_order.id','desc')
        ->get();

        return view('purchase/viewpurchase_order',compact('data', 'supplierlist'));
    }

     public function view_all_details_po($id)
    {
        $data = PurchaseorderModel::join('purchase_item','purchase_order.id','=','purchase_item.po_id_fk')
        ->select('purchase_order.po_closing_date','purchase_order.purchase_date','purchase_order.id','purchase_order.created_at','purchase_order.updated_at','purchase_order.po_supplier_name','purchase_order.po_supplier_currency','purchase_order.po_closing_date','purchase_order.po_ex_usd_rate','purchase_order.po_ex_aud_rate','purchase_order.po_narration','purchase_item.pi_booking_reference','purchase_item.pi_supplier_amount','purchase_item.id')  
        ->where('purchase_order.id','=',$id)
        ->get();
         $supplierlist = AccountModel::where('is_supplier_account', '1')->pluck('account_name', 'id')->toArray();

        $currency_list = CountrySetupModel::all()->pluck('currency_code', 'id')->toArray();
        return view('purchase/view-all-details-po',compact('data','currency_list', 'supplierlist')); 
    }

        public function edit_purchase_order($id)
    {
        $data = PurchaseorderModel::join('purchase_item','purchase_order.id','=','purchase_item.po_id_fk')
        ->select('purchase_order.po_closing_date','purchase_order.purchase_date','purchase_order.id','purchase_order.created_at','purchase_order.updated_at','purchase_order.po_supplier_name','purchase_order.po_supplier_currency','purchase_order.po_closing_date','purchase_order.po_ex_usd_rate','purchase_order.po_ex_aud_rate','purchase_order.po_narration','purchase_item.pi_booking_reference','purchase_item.pi_supplier_amount','purchase_item.pi_amount')  
        ->where('purchase_order.id','=',$id)
        ->get();

        $currency_list = CountrySetupModel::all()->pluck('currency_code', 'id')->toArray();

        return view('purchase/editpurchase_order',compact('data','currency_list')); 
    }

        public function update_purchase_order(Request $request, $id)
    {
        //dd($request->items);
        $data = PurchaseorderModel::find($id);
        $data->purchase_date = $request->purchase_date;
        $data->po_supplier_name = $request->po_supplier_name;
        $data->po_supplier_currency = $request->po_supplier_currency;
        $data->po_closing_date = $request->po_closing_date;
        $data->po_ex_usd_rate = $request->po_ex_usd_rate;
        $data->po_ex_aud_rate = $request->po_ex_aud_rate;
        $data->po_narration = $request->po_narration;
        
        if($data->save())
        {
            $items = $request->input('items');

            foreach ($items as $item)
            {
                $itemss = PurchaseitemModel::find($id);
                  
                $itemss->pi_booking_reference = $item['pi_booking_reference'];
                $itemss->pi_supplier_amount = $item['pi_supplier_amount'];
                
                $itemss->pi_amount = $item['pi_amount'];
                $itemss->save();
            }
        return redirect('purchase/view_purchase_order')->with('msg',"Purchase Order Update Successfully");
        }else
        {
            return redirect('purchase/edit_purchase_order')->with('danger',"Error! Try Again");
        }
            
    }

    public function delete_purchase_order($id)
    {
        $result = PurchaseorderModel::join('purchase_item','purchase_order.id','=','purchase_item.po_id_fk')
        ->where('purchase_order.id','=',$id)
        ->delete();
        return redirect('purchase/view_purchase_order')->with('msg',"Purchase Order Delete Successfully");
    }

    public function delete_purchase_item($id)
    {
        $result = PurchaseitemModel::find($id);
        $result->delete();
        return redirect('purchase/view_all_details_po/'.$id)->with('msg',"Purchase item Delete Successfully");
    }

}

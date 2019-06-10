<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxModel;

class TaxController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    protected function index() {
        $data = array();
        $data['Tax'] = TaxModel::get();
        return view('taxList', $data);
    }

    protected function addTax() {
        $data = array();
        $data['Tax'] = TaxModel::get();
        return view('AddTax', $data);
    }
    protected function EditTax($id) {
        $data = array();
        $data['Tax']= TaxModel::find($id)->get();
        return view('EditTax', $data);
    }
    protected function ReadTax($id) {
        $data = array();
        $data['Tax']= TaxModel::find($id)->get();
        return view('ReadTax', $data);
    }
    protected function TaxSave(Request $req_data) {
        $data=array();
        $this->validate($req_data, [
            'tax_type_code' => 'required',
            'tax_type_name' => 'required',
            'tax_rate' => 'required|numeric|min:0|max:100',
        ]);
        
        $TaxModel=new TaxModel();
        $TaxModel->tax_type_code=$req_data->tax_type_code;
         $TaxModel->tax_type_name=$req_data->tax_type_name;
          $TaxModel->tax_rate=$req_data->tax_rate;
         if ($TaxModel->save()) {
            return back()->with('success', 'Tax has been Added successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }
    protected function TaxDelete($id) {
        $tax = TaxModel::find($id);
        if ($tax->delete()) {
            return back()->with('success', 'Tax has been deleted successfully!');
        }
    }
    protected function TaxEditSave(Request $req_data) {
        $data=array();
        $this->validate($req_data, [
            'tax_type_code' => 'required',
            'tax_type_name' => 'required',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'id'=>'required',
        ]);
        
        $TaxModel= TaxModel::find($req_data['id']);
        $TaxModel->tax_type_code=$req_data->tax_type_code;
         $TaxModel->tax_type_name=$req_data->tax_type_name;
          $TaxModel->tax_rate=$req_data->tax_rate;
         if ($TaxModel->save()) {
            return back()->with('success', 'Tax has been Updated successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }
    

}

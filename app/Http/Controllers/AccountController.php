<?php

namespace App\Http\Controllers;
use App\AccountModel;
use Illuminate\Http\Request;
use App\AccountGroupModel;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    protected function index() {
        $data = array();
        $data['accounts'] = AccountModel::get();
        $newarray = Array('0' => '<i class="fa fa-times text-danger" aria-hidden="true"></i>', '1' => '<i class="fa fa-check text-success" aria-hidden="true"></i>');
        $data['func'] = $newarray;
        $data['groupnamelist'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['groupnamelist']=array(''=>'-')+$data['groupnamelist'];
        $ParentsAccountName = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();
        $data['ParentsAccountName'] = array('0' => '-') + $ParentsAccountName;
        return view('AccountList', $data);
    }
    protected function accountEdit($id) {
        $data = array();
        $data['accounts'] = AccountModel::where('id', $id)->get();
        $data['accountgroup'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['ParentsAccount'] = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();
        $data['ReturnTrueFalseBaseOnValue'] = array('0' => '', '1' => 'true');
        return view('EditAccount', $data);
    }

    protected function accountEditSave(Request $req_data) {
        $data = array();
        $data['accountgroup'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['ParentsAccount'] = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();
        $this->validate($req_data, [
            'account_name' => 'required',            
            'id' => 'required',
        ]);

        $accounts = AccountModel::find($req_data['id']);
        $accounts->account_name = $req_data['account_name'];
        $accounts->account_group = $req_data['account_group'];
        $accounts->parent_account = $req_data['parent_account'];
//        $accounts->advance_account=$req_data['advance_account'];
        if (!empty($req_data['is_cash_or_bank'])) {
            $accounts->is_cash_or_bank = $req_data['is_cash_or_bank'];
        }else{
            $accounts->is_cash_or_bank ='0';
        }
        
        if (!empty($req_data['is_customer_related'])) {
            $accounts->is_customer_related = $req_data['is_customer_related'];
        }else{
            $accounts->is_cash_or_bank ='0';
        } if (!empty($req_data['all_ledger_printing'])) {
            $accounts->all_ledger_printing = $req_data['all_ledger_printing'];
        }else{
            $accounts->all_ledger_printing ='0';
        } if (!empty($req_data['is_supplier_account'])) {
            $accounts->is_supplier_account = $req_data['is_supplier_account'];
        }else{
            $accounts->is_supplier_account ='0';
        } if (!empty($req_data['is_expense_account'])) {
            $accounts->is_expense_account = $req_data['is_expense_account'];
        }else{
            $accounts->is_expense_account ='0';
        }
        $accounts->account_additional_info = $req_data['account_additional_info'];
        if ($accounts->save()) {
            return back()->with('success', 'Account has been updated successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
        return view('AddAccount', $data);
    }

    protected function accountRead($id) {
        $data = array();
        $data['accounts'] = AccountModel::where('id', $id)->get();
        $data['accountgroup'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['ParentsAccount'] = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();
        $data['ReturnTrueFalseBaseOnValue'] = array('0' => '', '1' => 'true');
        return view('ReadAccount', $data);
    }

    protected function accountDelete($id) {
        $user = AccountModel::find($id);
        if ($user->delete()) {
            return back()->with('success', 'Account Group has been deleted successfully!');
        }
    }

    protected function accountStatus($id) {
        $user = AccountModel::find($id);
        $statusValue = "1";
        if ($user->status == '1') {
            $statusValue = '0';
        } else {
            $statusValue = '1';
        }
        $user->status = $statusValue;
        if ($user->save()) {
            return back()->with('success', 'Status has been updated successfully!');
        }
    }

    protected function addAccount() {
        $data = array();
        $data['accountgroup'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['ParentsAccount'] = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();

        return view('AddAccount', $data);
    }

    protected function accountSave(Request $req_data) {
        $data = array();
        $data['accountgroup'] = AccountGroupModel::pluck('group_name', 'id')->toArray();
        $data['ParentsAccount'] = AccountModel::where('parent_account', '0')->pluck('account_name', 'id')->toArray();
        $this->validate($req_data, [
            'account_name' => 'required',
            
        ]);

        $accounts = new AccountModel;

        $accounts->account_name = $req_data['account_name'];
        $accounts->account_group = $req_data['account_group'];
        $accounts->parent_account = $req_data['parent_account'];
//        $accounts->advance_account=$req_data['advance_account'];
        if (!empty($req_data['is_cash_or_bank'])) {
            $accounts->is_cash_or_bank = $req_data['is_cash_or_bank'];
        } if (!empty($req_data['is_customer_related'])) {
            $accounts->is_customer_related = $req_data['is_customer_related'];
        } if (!empty($req_data['all_ledger_printing'])) {
            $accounts->all_ledger_printing = $req_data['all_ledger_printing'];
        } if (!empty($req_data['is_supplier_account'])) {
            $accounts->is_supplier_account = $req_data['is_supplier_account'];
        } if (!empty($req_data['is_expense_account'])) {
            $accounts->is_expense_account = $req_data['is_expense_account'];
        }
        $accounts->account_additional_info = $req_data['account_additional_info'];
        if ($accounts->save()) {
            return back()->with('success', 'Account has been added successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
        return view('AddAccount', $data);
    }

}

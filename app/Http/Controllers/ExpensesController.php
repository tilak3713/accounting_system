<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpensesModel;
use App\AccountModel;
use App\TaxModel;

class ExpensesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = array();
        $data['expenses'] = ExpensesModel::get();
        $data['cashOrBankAccounts'] = AccountModel::where('is_cash_or_bank', '1')->pluck('account_name', 'id')->toArray();
        $data['expenseAccount'] = AccountModel::where('is_expense_account', '1')->pluck('account_name', 'id')->toArray();
        return view('expensesList', $data);
    }

    protected function addExpenses() {
        $data = array();
        $data['cashOrBankAccounts'] = AccountModel::where('is_cash_or_bank', '1')->pluck('account_name', 'id')->toArray();
        $data['expenseAccount'] = AccountModel::where('is_expense_account', '1')->pluck('account_name', 'id')->toArray();
        $data['tax_type'] = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
        return view('AddExpenses', $data);
    }

    protected function addExpensesSave(Request $reg_data) {
        $this->validate($reg_data, [
            'cash_or_bank_ac' => 'required',
            'account' => 'required',
            'amount_without_tax' => 'required',
            'tax_type' => 'required',
            'tax_amount' => 'required',
            'amount_with_tax' => 'required',
        ]);
        $expenseField = new ExpensesModel;
        $expenseField->cash_or_bank_ac = $reg_data->cash_or_bank_ac;
        $expenseField->account = $reg_data->account;
        $expenseField->amount_without_tax = $reg_data->amount_without_tax;
        $expenseField->tax_type = $reg_data->tax_type;
        $expenseField->tax_amount = $reg_data->tax_amount;
        $expenseField->amount_with_tax = $reg_data->amount_with_tax;
        $expenseField->narration = $reg_data->narration;
        if ($expenseField->save()) {
            return back()->with('success', 'Account has been saved successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }
    
    protected function EditExpenses($id) {
        $data=array();
        $data['cashOrBankAccounts'] = AccountModel::where('is_cash_or_bank', '1')->pluck('account_name', 'id')->toArray();
        $data['expenseAccount'] = AccountModel::where('is_expense_account', '1')->pluck('account_name', 'id')->toArray();
        $data['tax_type'] = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
        $data['expense']= ExpensesModel::find($id)->get();
        return view('EditExpenses', $data);
    }
    
    protected function ReadExpenses($id) {
        $data=array();
        $data['cashOrBankAccounts'] = AccountModel::where('is_cash_or_bank', '1')->pluck('account_name', 'id')->toArray();
        $data['expenseAccount'] = AccountModel::where('is_expense_account', '1')->pluck('account_name', 'id')->toArray();
        $data['tax_type'] = TaxModel::pluck('tax_type_name', 'tax_rate')->toArray();
        $data['expense']= ExpensesModel::find($id)->get();
        return view('ReadExpenses', $data);
    }
     protected function ExpensesDelete($id) {
        $Expense = ExpensesModel::find($id);
        if ($Expense->delete()) {
            return back()->with('success', 'Expense has been deleted successfully!');
        }
    }
     protected function ExpensesEditSave(Request $reg_data) {
        $this->validate($reg_data, [
            'cash_or_bank_ac' => 'required',
            'account' => 'required',
            'amount_without_tax' => 'required',
            'tax_type' => 'required',
            'tax_amount' => 'required',
            'amount_with_tax' => 'required',
            'id'=>'required',
        ]);
        $expenseField = ExpensesModel::find($reg_data['id']);
        $expenseField->cash_or_bank_ac = $reg_data->cash_or_bank_ac;
        $expenseField->account = $reg_data->account;
        $expenseField->amount_without_tax = $reg_data->amount_without_tax;
        $expenseField->tax_type = $reg_data->tax_type;
        $expenseField->tax_amount = $reg_data->tax_amount;
        $expenseField->amount_with_tax = $reg_data->amount_with_tax;
        $expenseField->narration = $reg_data->narration;
        if ($expenseField->save()) {
            return back()->with('success', 'Account has been updated successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }

}

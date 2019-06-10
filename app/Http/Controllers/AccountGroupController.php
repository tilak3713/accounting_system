<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountGroupModel;

class AccountGroupController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    protected function index() {
        $data = array();
        $AccountGroupModel = new AccountGroupModel;
        $data['accountgroup'] = $AccountGroupModel->all();
        return view('AccountGroupViewlist', $data);
    }

    protected function accountGroupAdd() {
        return view('AccountGroupAdd');
    }

    protected function accountGroupEdit($id) {
        $data = array();
        $data['accountgroup'] = AccountGroupModel::where('id', $id)->get();
        return view('AccountGroupEdit', $data);
    }

    protected function accountGroupDelete($id) {
        $user = AccountGroupModel::find($id);
        if ($user->delete()) {
            return back()->with('success', 'Account Group has been deleted successfully!');
        }
    }

    protected function accountGroupStatus($id) {
        $user = AccountGroupModel::find($id);
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

    protected function accountGroupEditSave(Request $data) {
        $this->validate($data, [
            'group_name' => 'required',
            'group_type' => 'required',
            'id' => 'required',
        ]);
        $accountGroup = AccountGroupModel::find($data['id']);
        $accountGroup->group_name = $data['group_name'];
        $accountGroup->group_type = $data['group_type'];
        if ($accountGroup->save()) {
            return back()->with('success', 'Account Group has been added successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }

    protected function accountGroupSave(Request $data) {
        $this->validate($data, [
            'group_name' => 'required',
            'group_type' => 'required',
        ]);
        $accountGroup = new AccountGroupModel;
        $accountGroup->group_name = $data['group_name'];
        $accountGroup->group_type = $data['group_type'];
        if ($accountGroup->save()) {
            return back()->with('success', 'Account Group has been added successfully.');
        } else {
            return back()->with('error', 'Please try again after somtime.');
        }
    }

}

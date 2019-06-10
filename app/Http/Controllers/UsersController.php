<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    private $userData;

    public function __construct() {
        $this->middleware('auth');
        $this->userData = New User;
    }

    protected function index() {
        $data = array();
        $data['userslist'] = $this->userData->all();
        return view('userslist', $data);
    }

    protected function profile($id) {
        $data = array();
        $data['user'] = User::where('id', $id)->get();
        return view('profileedit', $data);
    }

    protected function profile_save(Request $request) {
        $id = $request->input('id');
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($user->save()) {
            return back()->with('success', 'profile has been updated');
        } else {
            return back()->with('error', 'Please try after sometime, Thank you');
        }
    }

    protected function settings(Request $data) {
        $this->validate($data, [
            'oldpassword' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $id = $data->input('id');
        $user = User::find($id);
        if (!Hash::check($data['oldpassword'], $user->password)) {
            return back()->with('error', 'Incorrect old password');
        } else {
            $user->password = Hash::make($data['password']);
            if ($user->save()) {
                return back()->with('success', 'Password has been successfully changed.');
            }
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AuthAdminController extends Controller
{
    public function __construct(){
      $this->middleware('guest:admin')->except('adminLogout');
    }
    public function showLoginForm(){
      return view('auth.login');
    }

    public function login(Request $request){
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
      ]);

      $credential = [
        'username' => $request->username,
        'password' => $request->password
      ];

      if(! Auth::guard('admin')->attempt($credential, $request->member)){
        return redirect()->back()->with('error','Login Gagal');
      }

      $admin = Admin::find(Auth::guard('admin')->user()->id);
      return redirect()->route('dashboard')->with('success','Selamat datang'.$admin->name);
    }

    public function adminLogout(){
      Auth::guard('admin')->logout();
      return redirect('login');
    }
}

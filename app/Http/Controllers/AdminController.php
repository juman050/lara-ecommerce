<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class AdminController extends Controller
{
   
    public function index() {
        $this->admin_auth_check();
        return view('admin.login.login');
    }
    public function admin_login_check(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $adminInfo = DB::table('admin')->where('admin_email',$email)
                                   ->where('admin_password',$password)
                                   ->first();
         if($adminInfo){
             Session::put('admin_name',$adminInfo->admin_name);
             Session::put('admin_id',$adminInfo->admin_id);
             return Redirect::to('/dashboard');
         }else{
             Session::put('exception','Your Email Or Password Invalide !');
             return Redirect::to('/admin');
         }
        
    }
    
    private function admin_auth_check() {
        $admin_id = Session::get('admin_id');
         if($admin_id != NULL){
             return Redirect::to('/dashboard')->send();
         }
    }
}

<?php

namespace App\Http\Controllers;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();
class SuperAdminController extends Controller
{
    
   public function index() {
       $this->checkAuth();
       return view('admin.infobox.infobox');
    }
    public function profile() {
        $this->checkAuth();
        $adminInfo = DB::table('admin')->where('admin_id',Session::get('admin_id'))->get()->first();
        return view('admin.profile.profile',['adminInfo'=>$adminInfo]);
    }
    public function modifyProfile(Request $request) {
        $this->validate($request, [
            'admin_name' => 'Required|Min:3|Max:80',
            'admin_email' => 'Required|Between:3,64|Email',
            'admin_password' => 'alpha_num|between:6,12',
        ]);
        $changePassword = $request->admin_password;
        if($changePassword){
            DB::table('admin')->where('admin_id', Session::get('admin_id'))->update(array(
            'admin_name'    =>  $request->admin_name,
            'admin_email'    =>  $request->admin_email,
            'admin_password'    =>  md5($request->admin_password),
       
           ));
            return redirect()->back()->with('message','Your profile has been updated.');
        } else {
            DB::table('admin')->where('admin_id', Session::get('admin_id'))->update(array(
            'admin_name'    =>  $request->admin_name,
            'admin_email'    =>  $request->admin_email,
           ));
            return redirect()->back()->with('message','Your profile has been updated.');
        }
    }
   
    public function logout() {
        Session::put('admin_id','');
        Session::put('admin_name','');
        Session::put('message','You are successfully logout.');
        return Redirect::to('/admin');
    }
    private function checkAuth() {
         $admin_id = Session::get('admin_id');
         if($admin_id == NULL){
             return Redirect::to('/admin')->send();
         }
    }
}

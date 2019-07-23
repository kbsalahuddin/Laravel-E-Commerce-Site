<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SuperAdminController extends Controller
{
    public function logout(){
    	Session::flush();
    	return redirect('/admin');

    }

    public function index(){
		//$this->AuthCheck();
		return view('admin.includes.dashboard-body');
	}
    
    /*public function AuthCheck(){
		$adminId=Session::get('adminId');
		if($adminId){
			return redirect('/dashboard');
		}else{
			return redirect('/admin')->send();
		}
	}*/	
}

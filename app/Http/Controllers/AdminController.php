<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


session_start();
class AdminController extends Controller
{
	public function index(){
		return view('admin.admin-login');
	}



	public function adminVerification(Request $request){
		$adminEmail=$request->adminEmail;
		$adminPassword=md5($request->adminPassword);
		$result=DB::table('admin')
			->where('adminEmail',$adminEmail)
			->where('adminPassword', $adminPassword)
			->first();
		if($result){
			Session::put('adminName',$result->adminName);
			Session::put('adminId',$result->adminId);
			return redirect('/dashboard');
		}else{

			Session::put('message', 'Email or Password Invalid');
			return redirect('/admin');
		}
	}
}

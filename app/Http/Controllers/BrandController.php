<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class BrandController extends Controller
{
    
   /* public function AuthCheck(){
        $adminId=Session::get('adminId');
        if($adminId){
            return;
        }else{
            return redirect('/admin')->send();
        }
    }*/   


    public function index(){
        //$this->AuthCheck();
    	return view('admin.add-brand');


    }

    public function allBrand(){
        //$this->AuthCheck();
    	$allBrandInfo= DB::table('brands')
    		->orderBy('brands.brandId', 'ASC')
    		->get();
    	$manageBrand= view('admin.all-brand')->with('allBrandInfo', $allBrandInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.all-brand', $manageBrand);
    }
    
    public function saveBrand(Request $request){
    	$data=array();
    	$data['brandId']=$request->brandId;
    	$data['brandName']=$request->brandName;
    	$data['brandDescription']= strip_tags($request->brandDescription);
    	$data['brandStatus']=$request->brandStatus;

    	DB::table('brands')->insert($data);
    	Session::put('message','Brand inserted successfully');
    	return redirect('/add-brand');
    }

    public function unpublishedBrand($brandId){

    	DB::table('brands')
    		->where('brandId',$brandId)
    		->update(['brandStatus'=>'unpublished']);
    	return redirect('/all-brand');

    }
    public function publishedBrand($brandId){

    	DB::table('brands')
    		->where('brandId',$brandId)
    		->update(['brandStatus'=>'published']);
    	return redirect('/all-brand');

    }
    
    public function editBrand($brandId){
        //$this->AuthCheck();
    	$brandInfo= DB::table('brands')
    		->where('brandId',$brandId)   		
    		->first();
    	$brandById= view('admin.edit-brand')->with('brandInfo', $brandInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.edit-brand', $brandById);	
    	//return view('admin.edit-brand');
	}

	public function updateBrand(Request $request, $brandId){
		$data=array();
    	
    	$data['brandName']=$request->brandName;
    	$data['brandDescription']=$request->brandDescription;
    	

    	DB::table('brands')
    		->where('brandId',$brandId)
    		->update($data);
    	//Session::get('message','Category updated successfully');
    	return redirect('/all-brand');


	}

    public function deleteBrand($brandId){

		DB::table('brands')
			->where('brandId',$brandId)
			->delete();
		return redirect('/all-brand');	
	}    		
}

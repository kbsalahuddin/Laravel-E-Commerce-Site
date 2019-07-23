<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SliderController extends Controller
{
    /*public function AuthCheck(){
        $adminId=Session::get('adminId');
        if($adminId){
            return;
        }else{
            return redirect('/admin')->send();
        }
    } */  


    public function index(){
    	//$this->AuthCheck();
    	return view('admin.add-slider');
    }

    public function saveSlider(Request $request){
    	
    	$data = array();
    	$data['sliderStatus']=$request->sliderStatus;
    	$image=$request->file('sliderImage');

    	if($image){
    		$imageName=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$imageFullName=$imageName.'.'.$ext;
    		$uploadPath='slider/';
    		$imageUrl=$uploadPath.$imageFullName;
    		$success=$image->move($uploadPath,$imageFullName);
    		
    		if($success){
    			$data['sliderImage']=$imageUrl;
    			DB::table('sliders')->insert($data);
    			Session::put('message','Slider inserted successfully');
    			return redirect('/add-slider');
    		}
    	}

    	
    }

    public function allSlider(){
    	//$this->AuthCheck();

        $allSliderInfo= DB::table('sliders')
    		->orderBy('sliders.sliderId', 'ASC')
    		->get();
    	$manageSlider= view('admin.all-slider')->with('allSliderInfo', $allSliderInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.all-slider', $manageSlider);
    	
    }

    public function unpublishedSlider($sliderId){

    	DB::table('sliders')
    		->where('sliderId',$sliderId)
    		->update(['sliderStatus'=>'unpublished']);
    	return redirect('/all-slider');

    }
    public function publishedSlider($sliderId){

    	DB::table('sliders')
    		->where('sliderId',$sliderId)
    		->update(['sliderStatus'=>'published']);
    	return redirect('/all-slider');

    }

 	public function deleteSlider($sliderId){

		DB::table('sliders')
			->where('sliderId',$sliderId)
			->delete();
		return redirect('/all-slider');	
	}   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class CategoryController extends Controller
{

   /* public function AuthCheck(){
        $adminId=Session::get('adminId');
        if($adminId){
            return;
        }else{
            return redirect('/admin')->send();
        }
    } */   

    public function index(){
        //$this->AuthCheck();
    	return view('admin.add-category');


    }

    public function allCategory(){
    	//$this->AuthCheck();
        $allCategoryInfo= DB::table('categories')
    		->orderBy('categories.categoryId', 'ASC')
    		->get();
    	$manageCategory= view('admin.all-category')->with('allCategoryInfo', $allCategoryInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.all-category', $manageCategory);

    }

    public function saveCategory(Request $request){
    	$data=array();
    	$data['categoryId']=$request->categoryId;
    	$data['categoryName']=$request->categoryName;
    	$data['categoryDescription']= strip_tags($request->categoryDescription);
    	$data['categoryStatus']=$request->categoryStatus;

    	DB::table('categories')->insert($data);
    	Session::put('message','Category inserted successfully');
    	return redirect('/add-category');
    }

    public function unpublishedCategory($categoryId){

    	DB::table('categories')
    		->where('categoryId',$categoryId)
    		->update(['categoryStatus'=>'unpublished']);
    	return redirect('/all-category');

    }
    public function publishedCategory($categoryId){

    	DB::table('categories')
    		->where('categoryId',$categoryId)
    		->update(['categoryStatus'=>'published']);
    	return redirect('/all-category');

    }

    public function editCategory($categoryId){
        //$this->AuthCheck();
    	$categoryInfo= DB::table('categories')
    		->where('categoryId',$categoryId)
    		->first();
    	$categoryById= view('admin.edit-category')->with('categoryInfo', $categoryInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.edit-category', $categoryById);	
    	//return view('admin.edit-category');
	}

	public function updateCategory(Request $request, $categoryId){
		$data=array();
    	
    	$data['categoryName']=$request->categoryName;
    	$data['categoryDescription']=$request->categoryDescription;
    	

    	DB::table('categories')
    		->where('categoryId',$categoryId)
    		->update($data);
    	//Session::get('message','Category updated successfully');
    	return redirect('/all-category');


	}

	public function deleteCategory($categoryId){

		DB::table('categories')
			->where('categoryId',$categoryId)
			->delete();
		return redirect('/all-category');	
	}

  

}    
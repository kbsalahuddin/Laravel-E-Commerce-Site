<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use Illuminate\Support\Facades\Redirect;

session_start();
class ProductController extends Controller
{
    
    /*public function AuthCheck(){
        $adminId=Session::get('adminId');
        if($adminId){
            return;
        }else{
            return redirect('/admin')->send();
        }
    }*/

       
    public function index(){
        //$this->AuthCheck();
    	return view('admin.add-product');


    }

    public function allProduct(){
        //$this->AuthCheck();
    	$allProductInfo= DB::table('products')
    		->orderBy('products.productId', 'ASC')
    		->join('categories','products.categoryId','=','categories.categoryId')
    		->join('brands','products.brandId','=','brands.brandId')
    		->get();
    	$manageProduct= view('admin.all-product')->with('allProductInfo', $allProductInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.all-product', $manageProduct);
    }

    public function saveProduct(Request $request){
    	$data=array();
    	$data['productId']=$request->productId;
    	$data['categoryId']=$request->categoryId;
    	$data['brandId']=$request->brandId;
    	$data['productName']=$request->productName;
    	$data['productShortDescription']=strip_tags($request->productShortDescription);
    	$data['productLongDescription']=strip_tags($request->productLongDescription);
    	$data['productPrice']=$request->productPrice;
    	
    	$data['productSize']=$request->productSize;
    	$data['productStatus']=$request->productStatus;
    	$image=$request->file('productImage');

    	if($image){
    		$imageName=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$imageFullName=$imageName.'.'.$ext;
    		$uploadPath='images/';
    		$imageUrl=$uploadPath.$imageFullName;
    		$success=$image->move($uploadPath,$imageFullName);
    		
    		if($success){
    			$data['productImage']=$imageUrl;
    			DB::table('products')->insert($data);
    			Session::put('message','Product inserted successfully');
    			return redirect('/add-product');
    		}
    	}
    	$data['productImage']='';
    	DB::table('products')->insert($data);
    	Session::put('message','Product inserted successfully, without image');
    	return redirect('/add-product');
    }

    public function unpublishedProduct($productId){

    	DB::table('products')
    		->where('productId',$productId)
    		->update(['productStatus'=>'unpublished']);
    	return redirect('/all-product');

    }
    public function publishedProduct($productId){

    	DB::table('products')
    		->where('productId',$productId)
    		->update(['productStatus'=>'published']);
    	return redirect('/all-product');

    }

    public function editProduct($productId){
        //$this->AuthCheck();
    	$productInfo= DB::table('products')
    		
    		->join('categories','products.categoryId','=','categories.categoryId')
    		->join('brands','products.brandId','=','brands.brandId')
    		->where('productId',$productId)   		
    		->first();
    	$productById= view('admin.edit-product')->with('productInfo', $productInfo);
    	
    	return view('admin.dashboard')
    		-> with('admin.edit-product', $productById);
    }		

    public function updateProduct(Request $request, $productId){
    	$data=array();
    	
    	$data['categoryId']=$request->categoryId;
    	$data['brandId']=$request->brandId;
    	$data['productName']=$request->productName;
    	$data['productShortDescription']=strip_tags($request->productShortDescription);
    	$data['productLongDescription']=strip_tags($request->productLongDescription);
    	$data['productPrice']=$request->productPrice;
    	
    	$data['productSize']=$request->productSize;
    	$data['productStatus']=$request->productStatus;
    	$image=$request->file('productImage');

    	if($image){
    		
    		
    		$imageName=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$imageFullName=$imageName.'.'.$ext;
    		$uploadPath='images/';
    		$imageUrl=$uploadPath.$imageFullName;
    		$success=$image->move($uploadPath,$imageFullName);
    		
    		if($success){
    			$data['productImage']=$imageUrl;
    			DB::table('products')->where('productId', $productId)->update($data);
    			Session::put('message','Product updated successfully');
    			return redirect('/all-product');
    		}
    	}
    	$data['productImage']='';
    	DB::table('products')->where('productId', $productId)
    						 ->update($data);
    	Session::put('message','Product updated successfully, without image');
    	return redirect('/all-product');
    }


    




    public function deleteProduct($productId){

		DB::table('products')
			->where('productId',$productId)
			->delete();
		return redirect('/all-product');	
	}

}

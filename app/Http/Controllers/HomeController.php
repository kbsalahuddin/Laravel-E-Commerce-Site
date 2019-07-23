<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
	//for showing all the published products in the homepage 
	public function index(){
		
		$allPublishedProductInfo= DB::table('products')
    		->orderBy('products.productId', 'ASC')
    		->join('categories','products.categoryId','=','categories.categoryId')
    		->join('brands','products.brandId','=','brands.brandId')
    		->where('productStatus','published')
    		->limit(9)
    		->get();
    	$managePublishedProduct= view('pages.home-content')->with('allPublishedProductInfo', $allPublishedProductInfo);
    	
    	return view('welcome')
    		-> with('pages.home-content', $managePublishedProduct);
		//return view('pages.home-content');
	}

    public function showProductByCategory($categoryId){
        $ProductByCategory= DB::table('products')
            ->orderBy('products.productId', 'ASC')
            ->join('categories','products.categoryId','=','categories.categoryId')
            ->select('products.*','categories.categoryName')
            ->where('categories.categoryId',$categoryId)
            ->where('products.productStatus','published')
            ->limit(9)
            ->get();
        $manageProductByCategory= view('pages.product-by-category')->with('ProductByCategory', $ProductByCategory);
        
        return view('welcome')
            -> with('pages.product-by-category', $manageProductByCategory);        
    }

    public function showProductByBrand($brandId){
        
        $ProductByBrand= DB::table('products')
            ->orderBy('products.productId', 'ASC')
            ->join('categories','products.categoryId','=','categories.categoryId')
            ->join('brands','products.brandId','=','brands.brandId')
            ->select('products.*','categories.categoryName','brands.brandName')
            ->where('brands.brandId',$brandId)
            ->where('productStatus','published')
            ->limit(9)
            ->get();
        $manageProductByBrand= view('pages.product-by-brand')->with('ProductByBrand', $ProductByBrand);
        
        return view('welcome')
            -> with('pages.product-by-brand', $manageProductByBrand);

    }



    public function viewDetailProduct($productId){
        
        $ProductDetail= DB::table('products')
            ->orderBy('products.productId', 'ASC')
            ->join('categories','products.categoryId','=','categories.categoryId')
            ->join('brands','products.brandId','=','brands.brandId')
            ->select('products.*','categories.categoryName','brands.brandName')
            ->where('products.productId',$productId)
            ->where('productStatus','published')
            ->first();
        $manageProductDetail= view('pages.view-product-detail')->with('ProductDetail', $ProductDetail);
        
        return view('welcome')
            ->with('pages.view-product-detail', $manageProductDetail);

    }
}





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{	

    public function addToCart(Request $request){
    	$qty= $request->qty;
    	$productId= $request->productId;
    	$productInfo=DB::table('products')
    				->where('productId',$productId)
    				->first();
    	$data['qty']=$qty;
    	$data['id']=$productInfo->productId;
    	$data['name']=$productInfo->productName;
    	$data['price']=$productInfo->productPrice;
    	$data['options']['image']=$productInfo->productImage;
    	Cart::add($data); 

    return redirect('/show-cart');				
    
    }

    public function showCart(){
    	$intoCart=DB::table('categories')
    				->where('categoryStatus','published')
    				->get();
    				
    	$manageCart= view('pages.add-to-cart')->with('intoCart', $intoCart);
    	
    	return view('welcome')
    		-> with('pages.add-to-cart', $manageCart);			
    }

    public function deleteCart($rowId){
    	Cart::update($rowId,0);
    	return redirect('/show-cart');
    }

    public function updateCart(Request $request){
    	$qty=$request->qty;
    	$rowId=$request->rowId;
    	Cart::update($rowId,$qty);
    	return redirect('/show-cart');
    }    
}

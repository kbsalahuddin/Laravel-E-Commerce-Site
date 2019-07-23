<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    public function loginCheck(){

    	return view('pages.login');
    }
    public function customerRegistration(Request $request){

    	$data=array();
    	$data['customerName']=$request->customerName;
    	$data['customerEmail']=$request->customerEmail;
    	$data['customerPassword']=md5($request->customerPassword);
    	$data['customerPhone']=$request->customerPhone;

    	$customerId= DB::table('customers')
    				->insertGetId($data);
    	Session::put('customerId',$customerId);
    	Session::put('customerName',$request->customerName);

    	return redirect('/checkout');			

    }    

    public function Checkout(){
        return view ('pages.checkout');

    }

    public function saveShippingDetail(Request $request){
        $data=array();
        $data['shipName']=$request->shipName;
        $data['shipEmail']=$request->shipEmail;
        $data['shipAddress']=$request->shipAddress;
        $data['shipPhone']=$request->shipPhone;
        $data['shipCity']=$request->shipCity;
        $shipId= DB::table('shippings')
                            ->insertGetId($data);
        Session::put('shipId',$shipId);
        return redirect('/payment');                    

    }


    public function customerLogin(Request $request){
        $customerEmail=$request->customerEmail;
        $customerPassword=md5($request->customerPassword);
        $result=DB::table('customers')
                    ->where('customerEmail',$customerEmail)
                    ->where('customerPassword', $customerPassword)
                    ->first();
        if($result){
            Session::put('customerId',$result->customerId);
            return redirect ('/checkout');
        }else{
            return redirect('/login-check');
        }            
    }

    public function Payment(){
        return view('pages.payment');
    }

    public function orderPlace(Request $request){
        $paymentOption=$request->paymentOption;
        $payData=array();
        $payData['paymentOption']=$paymentOption;
        $payData['paymentStatus']='pending';
        $payDataId= DB::table('payments')
                ->insertGetId($payData);
        
        $orderData=array();
        $orderData['customerId']=Session::get('customerId');
        $orderData['shipId']=Session::get('shipId');
        $orderData['paymentId']=$payDataId;
        $orderData['orderTotal']=Cart::total();
        $orderData['orderStatus']='pending';
        $orderDataId=DB::table('orders')
                    ->insertGetId($orderData);

        $contents= Cart::content();
        $orderDetails= array();
        foreach ($contents as $content){
            $orderDetails['orderId']=$orderDataId;
            $orderDetails['productId']=$content->id;
            $orderDetails['productName']=$content->name;
            $orderDetails['productPrice']=$content->price;
            $orderDetails['productQuantity']=$content->qty;

            DB::table('order_details')->insert($orderDetails);
        }

        if($paymentOption=='master' || $paymentOption=='visa'){
            Cart::destroy();
            return redirect('/');
        }elseif($paymentOption=='cash'){
            Cart::destroy();
            return redirect('/');
        }else{
            echo "please go back and select an option for payment";
        } 


    }



    public function customerLogout(){
        
        Session::flush(); 
        
        return redirect('/');

    }  





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ManageOrderController extends Controller
{
	/*public function AuthCheck(){
        $adminId=Session::get('adminId');
        if($adminId){
            return;
        }else{
            return redirect('/admin')->send();
        }
    }*/


    public function manageOrder(){
        //$this->AuthCheck();

        $allOrderInfo= DB::table('orders')
            ->orderBy('orders.orderId', 'ASC')
            ->join('customers','orders.customerId','=','customers.customerId')
            ->select('orders.*', 'customers.customerName')
            ->get();
        
        $manageOrderInfo= view('admin.manage-order')->with('allOrderInfo', $allOrderInfo);
        
        return view('admin.dashboard')
            -> with('admin.manage-order', $manageOrderInfo);        
    }

    public function viewOrder($orderId){
    	//$this->AuthCheck();
        
        $orderDetailById= DB::table('orders')
        	->WHERE ('orders.orderId',$orderId) 
            ->orderBy('orders.orderId', 'ASC')
            
            ->join('customers','orders.customerId','=','customers.customerId')
            ->join('payments','orders.paymentId','=','payments.paymentId')
            ->join('order_details','orders.orderId','=','order_details.orderId')
            ->join('shippings','orders.shipId','=','shippings.shipId')
            ->select('orders.*', 'customers.customerName', 'customers.customerPhone', 'payments.*', 'order_details.*', 'shippings.*')
            ->get();
        
        $manageOrderDetailById= view('admin.view-order')->with('orderDetailById', $orderDetailById);
        
        return view('admin.dashboard')
            -> with('admin.view-order', $manageOrderDetailById); 

    }
}

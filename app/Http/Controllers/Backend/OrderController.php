<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\Model\logo;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pendingorders(){
        $data['orders']=Order::where('status','0')->get();
        return view('Backend.Order.pending-view',$data);
    }
    public function approvedorders(){
        $data['orders']=Order::where('status','1')->get();
        return view('Backend.Order.approved-view',$data);
    }

    public function orderapproved($id){
        $orders=Order::find($id);
        $orders->status= '1';
        $orders->save();

        return redirect()->route('approved-orders');

    }

    public function detailsorder($id){
        $data['order']= Order::find($id);

        return view('Backend.Order.order-details',$data);

    }
}

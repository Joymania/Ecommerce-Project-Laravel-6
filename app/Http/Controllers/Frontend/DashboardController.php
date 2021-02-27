<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use App\Model\logo;
use App\Model\Order;
use App\Model\Orderdetail;
use App\Model\Payment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Cart;
use Session;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard(){
            $data['logo']=logo::first();
            $data['contact']=Contact::first();
            $data['user']=Auth::user();
            return view('Frontend.singlePages.dashboard',$data);
    }
    public function editprofile(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['user']=User::find(Auth::user()->id);
        return view('Frontend.singlePages.edit-profile',$data);
    }

    public function updateprofile(Request $request){
        $user=User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;

            if($request->file('image')){
                $file=$request->file('image');
                @unlink(public_path('upload/user_images/'.$user->image));
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $user['image']=$filename;
            }
            $user->save();
            return redirect()->route('dashboard')->with('success','Profile Updated Successfully.');


    }

    public function  passwordchange(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['user']=User::find(Auth::user()->id);
        return view('Frontend.singlePages.password-change',$data);

    }
    public function passwordupdate(Request $request){
        if(Auth::attempt(['id' =>Auth::user()->id,'password' => $request->current_password])){
             $user=User::find(Auth::user()->id);
        $user->password=bcrypt($request->new_password) ;
        $user->save();
        return redirect()->route('dashboard')->with('success','Password Change Successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Sorry Your Password doesnot match.');
        }


    }

    public function customerpayment(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.customer-payment',$data);
    }

    public function paymentstore(Request $request){
        if($request->product_id==NULL){
            return redirect()->back()->with('message','Please add any product.');
        }
        else{
             $this->validate($request,[
            'payment_method'=>'required',
        ]);
        if($request->payment_method=='Bkash' && $request->transaction==NULL){
            return redirect()->back()->with('message','Transaction Field is Required.');
        }
        DB::transaction(function () use($request) {


            $payment= new Payment();
            $payment->payment_method = $request->payment_method;
            $payment->transaction = $request->transaction;
            $payment->save();
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->shipping_id = Session::get('shipping_id');
            $order->payment_id = $payment->id;
            $order_data = Order::orderBy('id','desc')->first();
            if($order_data == NULL){
                $first_reg=0;
                $order_no=$first_reg+1;
            }
            else{
                $order_data=Order::orderBy('id','desc')->first()->order_no;
                $order_no = $order_data+1;
            }
            $order->order_no = $order_no;
            $order->order_total = $request->order_total;
            $order->status = '0';
            $order->save();
            $contents = Cart::content();
            foreach($contents as $content) {
                $order_details = new Orderdetail();
                $order_details->order_id = $order->id;
                $order_details->product_id = $content->id;
                $order_details->color_id = $content->options->color_id;
                $order_details->size_id = $content->options->size_id;
                $order_details->quantity = $content->qty;
                $order_details->save();

            }


        });
        }


        Cart::destroy();
        return redirect()->route('order-list')->with('success','Data saved Successfully');
    }

    public function orderlist(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['orders']=Order::where('user_id',Auth::user()->id)->get();
        return view('Frontend.singlePages.customer-order',$data);
    }

    public function orderdetails($id){
       $orderdata= Order::find($id);
       $data['order']=Order::where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
       if($data['order']==false){
           return redirect()->back()->with('error','Check Only Your Orders');
       }
       else{
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['order']=Order::with(['orderdetails'])->where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
         return view('Frontend.singlePages.order-details',$data);
       }

    }

    public function printdetails($id){
        $orderdata= Order::find($id);
        $data['order']=Order::where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
        if($data['order']==false){
            return redirect()->back()->with('error','Check Only Your Orders');
        }
        else{
         $data['logo']=logo::first();
         $data['contact']=Contact::first();
         $data['order']=Order::with(['orderdetails'])->where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
          return view('Frontend.singlePages.print-details',$data);
        }

    }

}

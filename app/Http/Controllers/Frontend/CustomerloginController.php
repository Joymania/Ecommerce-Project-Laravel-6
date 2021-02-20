<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\About;
use App\Model\Communicate;
use App\Model\Contact;
use App\Model\logo;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\Slider;
use App\User;
use Illuminate\Support\Facades\Mail;

class CustomerloginController extends Controller
{
    public function customerlogin(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.customer-login',$data);
    }
    public function customersignup(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.customer-signup',$data);
    }
    public function signupStore(Request $request){
        $code=rand(0000,9999);
        $data =new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->password=bcrypt($request->password);
        $data->code=$code;
        $data->status='0';
        $data->usertype='customer';
        $data->save();

        $data =array(
            'email'=> $request->email,
            'code'=> $code
        );
        Mail::send('Frontend.emails.verify-email', $data, function ($message) use($data) {
            $message->from('khasan7890@gmail.com', 'Ecommerce Site');
            $message->to($data['email']);
            $message->subject('Plese Verify Your Email Address');
        });
        return redirect()->route('verify-email')->with('success','Your have successfully signed, please verify it');

    }

    public function verifyemail(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.verify-email',$data);
    }

    public function verifystore(Request $request){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $check=User::where('email',$request->email)->where('code',$request->code)->first();

        if($check){
            $check->status ='1';
            $check->save();
            return redirect()->route('customer-login')->with('success','Successfully Signed in.');
        }
        else
        {
            return redirect()->back()->with('error','Sorry! Email and Verification Code doesnott Match.');
        }

    }

}

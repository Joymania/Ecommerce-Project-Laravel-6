<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\Communicate;
use App\Model\Contact;
use App\Model\logo;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        $data['logo']=logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        return view('Frontend.layouts.home',$data);
    }
    public function aboutUs(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['about']=About::first();
        return view('Frontend.singlePages.aboutUS',$data);
    }
    public function contactUs(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.contactUs',$data);
    }
    public function shoppingcart(){
        return view('Frontend.singlePages.shopping-cart');
    }


    public function store(Request $request){
        $data =new Communicate();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile_no=$request->mobile_no;
        $data->address=$request->address;
        $data->message=$request->msg;
        $data->save();
        $data =array(
            'name'=> $request->name,
            'email'=> $request->email,
            'mobile_no'=> $request->mobile_no,
            'address'=> $request->address,
            'messages'=> $request->msg

        );
        Mail::send('Frontend.emails.contact', $data, function ($message) use($data) {
            $message->from('khasan7890@gmail.com', 'Joymania');
            $message->to($data['email']);
            $message->subject('Thanks For contact Us');
        });
        return redirect()->back()->with('success','Your message successfully sent.');

    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerview(){
        $data['User']=User::where('usertype','customer')->where('status','1')->get();
        return view('Backend.Customer.customer-view',$data);
    }
    public function draftview(){
        $data['User']=User::where('usertype','customer')->where('status','0')->get();
        return view('Backend.Customer.draft-view',$data);
    }
    public function delete(Request $request){
        $user=User::find($request->id);
        if(file_exists('upload/user_images' . $user->image)AND !empty($user->image)){
            unlink('upload/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->back()->with('success','Data deleted Successfully.');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('Backend.Users.view-profile',compact('user'));
    }
    public function edit(){
        $id=Auth::user()->id;
        $editdata=$user=User::find($id);
        return view('Backend.Users.edit-profile',compact('editdata'));
    }
    public function update(Request $request){
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $id=Auth::user()->id;
        $user=User::find($id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->gender=$request->gender;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_images/'.$user->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $user['image']=$filename;
        }
        $user->save();
        return redirect()->route('profiles.view')->with('success', 'Profile Updated Successfully.');
    }

    public function passwordedit(){
        return view('Backend.Users.edit-password');
    }
    public function passwordupdate(Request $request){
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user=User::find(Auth::user()->id);
            $user->password=bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('Success','Password Changed Successfully.');
        }
        else{
            return redirect()->back()->with('error','Sorry! your current password doesnot match');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(){
        $data['alldata']=User::all();
        return view('Backend.Users.user-view',$data);
    }
    public function add(){
        return view('Backend.Users.add-user');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email'
        ]);
        $data=new User();
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=User::find($id);
        return view('Backend.Users.edit-user',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=User::find($id);
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=User::find($id);
        if(file_exists('upload/user_images' . $data->image)AND !empty($data->image)){
            unlink('upload/user_images' . $data->image);
        }
        $data->delete();
        return redirect()->route('users.view')->with('success', 'Data Deleted Successfully.');
    }
}

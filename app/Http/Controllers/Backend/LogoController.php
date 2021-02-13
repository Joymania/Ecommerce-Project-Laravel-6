<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\logo;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    public function view(){
        $data['alldata']=logo::all();
        $data['countlogo']=logo::count();
        return view('Backend.Logo.logo-view',$data);
    }
    public function add(){
        return view('Backend.Logo.add-logo');
    }

    public function store(Request $request){

        $data=new logo();
        $data->created_by=Auth::user()->id;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Logo_images '),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=logo::find($id);
        return view('Backend.Logo.edit-logo',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=logo::find($id);
        $data->updated_by=Auth::user()->id;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/Logo_images/'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Logo_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=logo::find($id);
        if(file_exists('upload/Logo_images' . $data->image)AND !empty($data->image)){
            unlink('upload/user_Logo_imagesimages' . $data->image);
        }
        $data->delete();
        return redirect()->route('logo.view')->with('success', 'Data Deleted Successfully.');
    }
}

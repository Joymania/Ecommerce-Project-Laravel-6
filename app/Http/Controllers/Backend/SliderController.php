<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function view(){
        $data['alldata']=Slider::all();
        return view('Backend.Slider.slider-view',$data);
    }
    public function add(){
        return view('Backend.Slider.slider-add');
    }

    public function store(Request $request){

        $data=new Slider();
        $data->created_by=Auth::user()->id;
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images '),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=Slider::find($id);
        return view('Backend.Slider.edit-slider',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=Slider::find($id);
        $data->updated_by=Auth::user()->id;
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/Slider_images/'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images/'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=Slider::find($id);
        if(file_exists('upload/Slider_images' . $data->image)AND !empty($data->image)){
            unlink('upload/Slider_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('slider.view')->with('success', 'Data Deleted Successfully.');
    }
}

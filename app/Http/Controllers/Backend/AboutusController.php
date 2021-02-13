<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutusController extends Controller
{
    public function view(){
        $data['alldata']=About::all();
        return view('Backend.About.about-view',$data);
    }
    public function add(){
        return view('Backend.About.about-add');
    }

    public function store(Request $request){

        $data=new About();
        $data->created_by=Auth::user()->id;

        $data->description=$request->description;
        $data->save();
        return redirect()->route('about_us.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=About::find($id);
        return view('Backend.About.edit-about',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=About::find($id);
        $data->updated_by=Auth::user()->id;
        $data->description=$request->description;
        $data->save();
        return redirect()->route('about_us.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=About::find($id);
        $data->delete();
        return redirect()->route('about_us.view')->with('success', 'Data Deleted Successfully.');
    }
}

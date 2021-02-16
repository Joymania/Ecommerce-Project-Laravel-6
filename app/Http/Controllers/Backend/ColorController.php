<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Model\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function view(){
        $data['alldata']=Color::all();
        return view('Backend.Color.color-view',$data);
    }
    public function add(){

        return view('Backend.Color.color-add');
    }

    public function store(Request $request){
    $this->validate($request,[
            'name' => 'required|unique:categories,name',
            ]);
        $data=new Color();
        $data->created_by=Auth::user()->id;

        $data->name=$request->name;
        $data->save();
        return redirect()->route('color.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=Color::find($id);
        return view('Backend.Color.color-add',compact('editdata'));

    }
    public function update(ColorRequest $request, $id){
        $data=Color::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name=$request->name;
        $data->save();
        return redirect()->route('color.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=Color::find($id);
        $data->delete();
        return redirect()->route('color.view')->with('success', 'Data Deleted Successfully.');
    }
}

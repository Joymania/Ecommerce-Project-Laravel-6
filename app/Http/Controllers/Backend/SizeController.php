<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Model\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public function view(){
        $data['alldata']=Size::all();
        return view('Backend.Size.size-view',$data);
    }
    public function add(){

        return view('Backend.Size.size-add');
    }

    public function store(Request $request){
    $this->validate($request,[
            'name' => 'required|unique:categories,name',
            ]);
        $data=new Size();
        $data->created_by=Auth::user()->id;

        $data->name=$request->name;
        $data->save();
        return redirect()->route('size.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=Size::find($id);
        return view('Backend.Size.size-add',compact('editdata'));

    }
    public function update(SizeRequest $request, $id){
        $data=Size::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name=$request->name;
        $data->save();
        return redirect()->route('size.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=Size::find($id);
        $data->delete();
        return redirect()->route('size.view')->with('success', 'Data Deleted Successfully.');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class CategoryController extends Controller
{
    public function view(){
        $data['alldata']=Category::all();
        return view('Backend.Category.category-view',$data);
    }
    public function add(){

        return view('Backend.Category.category-add');
    }

    public function store(Request $request){
    $this->validate($request,[
            'name' => 'required|unique:categories,name',
            ]);
        $data=new Category();
        $data->created_by=Auth::user()->id;

        $data->name=$request->name;
        $data->save();
        return redirect()->route('category.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=Category::find($id);
        return view('Backend.Category.category-add',compact('editdata'));

    }
    public function update(CategoryRequest $request, $id){
        $data=Category::find($id);
        $data->updated_by=Auth::user()->id;
        $data->name=$request->name;
        $data->save();
        return redirect()->route('category.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->route('category.view')->with('success', 'Data Deleted Successfully.');
    }
}

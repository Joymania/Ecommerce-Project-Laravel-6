<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view(){
        $data['alldata']=Product::all();
        return view('Backend.Product.product-view',$data);
    }
    public function add(){
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['colors']=Color::all();
        $data['sizes']=Size::all();

        return view('Backend.Product.product-add',$data);
    }

    public function store(Request $request){
        DB::transaction(function () use($request) {
            $this->validate($request,[
            'name' => 'required|unique:products,name',
            'color_id' => 'required',
            'size_id' => 'required'
            ]);
        $data=new Product();
        $data->category_id = $request->category_id;
        $data->brand_id = $request->brand_id;
        $data->name=$request->name;
        $data->short_desc =$request->short_desc;
        $data->long_desc=$request->long_desc;
        $data->price=$request->price;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Product_images '),$filename);
            $data['image']=$filename;
        }
        if($data->save()){
            $files =$request->sub_image;
            if(!empty($files)){
                foreach($files as $file){
                    $filename=date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/Product_images/Product_sub_images '),$filename);
                    $subimage['sub_image']=$filename;

                    $subimage = new ProductSubImage();
                    $subimage->product_id =$data->id;
                    $subimage->sub_image = $filename;
                    $subimage->save();
                }
            }
            $colors=$request->color_id;
            if(!empty($colors)){
                foreach($colors as $color){
                     $mycolor= new ProductColor;
                $mycolor->product_id=$data->id;
                $mycolor->color_id =$color;
                $mycolor->save();
                }

            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                foreach($sizes as $size){
                     $mysize= new ProductSize;
                $mysize->product_id=$data->id;
                $mysize->size_id =$size;
                $mysize->save();
                }

            }
        }
        else{
            return redirect()->back()->with('error', 'Sorry! Data not saved.');
        }
        });

        return redirect()->route('product.view')->with('success', 'Data Store Successfully.');
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

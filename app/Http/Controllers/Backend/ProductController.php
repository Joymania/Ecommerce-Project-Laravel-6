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
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $data->slug=Str::slug($request->name);
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
                     $mycolor= new ProductColor();
                $mycolor->product_id=$data->id;
                $mycolor->color_id =$color;
                $mycolor->save();
                }

            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                foreach($sizes as $size){
                     $mysize= new ProductSize();
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
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['colors']=Color::all();
        $data['sizes']=Size::all();
        $data['editdata']=Product::find($id);
        $data['color_array']=ProductColor::select('color_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();
        $data['size_array']=ProductSize::select('size_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();
        return view('Backend.Product.product-add',$data);

    }
    public function update(ProductRequest $request, $id){
        DB::transaction(function () use($request, $id) {
            $this->validate($request,[
            'color_id' => 'required',
            'size_id' => 'required'
            ]);
        $data=Product::find($id);
        $data->category_id = $request->category_id;
        $data->brand_id = $request->brand_id;
        $data->name=$request->name;
        $data->slug=Str::slug($request->name);
        $data->short_desc =$request->short_desc;
        $data->long_desc=$request->long_desc;
        $data->price=$request->price;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Product_images '),$filename);
            if(file_exists('upload/Product_images/'.$data->image) AND !empty($data->image)){
                unlink('upload/Product_images/'.$data->image);
            }
            $data['image']=$filename;
        }
        if($data->save()){
            $files =$request->sub_image;
            if(!empty($files)){
                $subImage =ProductSubImage::where('product_id',$id)->get()->toArray();
                foreach($subImage as $value){
                    if(!empty($value)){
                        unlink('upload/Product_images/Product_sub_images/'.$value['sub_image']);
                    }
                }
                ProductSubImage::where('product_id',$id)->delete();
            }
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
                ProductColor::where('product_id',$id)->delete();
            }
            if(!empty($colors)){
                foreach($colors as $color){
                     $mycolor= new ProductColor();
                $mycolor->product_id=$data->id;
                $mycolor->color_id =$color;
                $mycolor->save();
                }

            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                ProductSize::where('product_id',$id)->delete();
            }
            if(!empty($sizes)){
                foreach($sizes as $size){
                     $mysize= new ProductSize();
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

    public function delete(Request $request){
        $data=Product::find($request->id);
        if(file_exists('upload/Product_images/'.$data->image) AND !empty($data->image)){
            unlink('upload/Product_images/'.$data->image);
        }
        $subImage=ProductSubImage::where('product_id',$data->id)->get()->toArray();
        if(!empty($subImage)){
            foreach($subImage as $value){
                if(!empty($value)){
                    unlink('upload/Product_images/Product_sub_images/'.$value['sub_image']);
                }
            }

        }
        ProductSubImage::where('product_id',$data->id)->delete();
        ProductColor::where('product_id',$data->id)->delete();
        ProductSize::where('product_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('product.view')->with('success', 'Data Deleted Successfully.');
    }

}

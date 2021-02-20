<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\Communicate;
use App\Model\Contact;
use App\Model\logo;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\Model\Color;
use App\Model\Size;

class CartController extends Controller
{
    public function insert(Request $request){
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required'

        ]);
        $product=Product::where('id',$request->id)->first();
        $product_size=Size::where('id',$request->size_id)->first();
        $product_color=Color::where('id',$request->color_id)->first();
        Cart::add([
            'id' =>$product->id,
            'qty' =>$request->qty,
            'price' =>$product->price,
            'name' =>$product->name,
            'weight' =>550,
            'options'=>[
                'size_id' =>$request->size_id,
                'size_name' =>$product_size->name,
                'color_id' =>$request->color_id,
                'color_name' =>$product_color->name,
                'image' =>$product->image
            ],

        ]);
        return redirect()->route('show.cart')->with('success','Product added Successfully.');

    }
    public function show(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.shopping-cart',$data);
    }

    public function update(Request $request){
        Cart::update($request->rowId,$request->qty);
        return redirect()->route('show.cart')->with('success','Product updated Successfully.');
    }
    public function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('error','Product removed Successfully.');

    }
}

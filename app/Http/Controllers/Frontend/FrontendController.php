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
use DB;
class FrontendController extends Controller
{
    public function index(){
        $data['logo']=logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::orderBy('id','desc')->paginate('12');
        return view('Frontend.layouts.home',$data);
    }
    public function aboutUs(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['about']=About::first();
        return view('Frontend.singlePages.aboutUS',$data);
    }
    public function contactUs(){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        return view('Frontend.singlePages.contactUs',$data);
    }
    public function shoppingcart(){
        $data['logo']=logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::orderBy('id','desc')->paginate('12');
        return view('Frontend.singlePages.shopping-cart',$data);
    }


    public function store(Request $request){
        $data =new Communicate();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile_no=$request->mobile_no;
        $data->address=$request->address;
        $data->message=$request->msg;
        $data->save();
        $data =array(
            'name'=> $request->name,
            'email'=> $request->email,
            'mobile_no'=> $request->mobile_no,
            'address'=> $request->address,
            'messages'=> $request->msg

        );
        Mail::send('Frontend.emails.contact', $data, function ($message) use($data) {
            $message->from('khasan7890@gmail.com', 'Joymania');
            $message->to($data['email']);
            $message->subject('Thanks For contact Us');
        });
        return redirect()->back()->with('success','Your message successfully sent.');

    }
    public function contactstore(Request $request){

    }

    public function productlist(){
        $data['logo']=logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::orderBy('id','desc')->paginate('12');
        return view('Frontend.singlePages.productlist-view',$data);
    }
    public function categoryWiseProduct($category_id){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['products']=Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();

        return view('Frontend.singlePages.categorylist-view',$data);
    }

    public function brandWiseProduct($brand_id){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['products']=Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();

        return view('Frontend.singlePages.brandlist-view',$data);
    }

    public function productdetails($slug){
        $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['products']=Product::where('slug',$slug)->first();
        $data['sub_images']=ProductSubImage::where('product_id',$data['products']->id)->get();
        $data['colors']=ProductColor::where('product_id',$data['products']->id)->get();
        $data['sizes']=ProductSize::where('product_id',$data['products']->id)->get();

        return view('Frontend.singlePages.productdetails-view',$data);
    }

    public function findproduct(Request $request){
        $slug= $request->slug;
        $data['products']=Product::where('slug',$slug)->first();
        if($data['products']){
            $data['logo']=logo::first();
        $data['contact']=Contact::first();
        $data['products']=Product::where('slug',$slug)->first();
        $data['sub_images']=ProductSubImage::where('product_id',$data['products']->id)->get();
        $data['colors']=ProductColor::where('product_id',$data['products']->id)->get();
        $data['sizes']=ProductSize::where('product_id',$data['products']->id)->get();

        return view('Frontend.singlePages.find-product',$data);
        }
        else
        {
            return redirect()->back()->with('error','Doesnot match any product');
        }

    }

    public function getproduct(Request $request){
        $slug=$request->slug;
        $productData=DB::table('products')
        ->where('slug','LIKE','%'.$slug.'%')
        ->get();
        $html = '';
        $html .= '<div><ul>';
        if($productData){
            foreach($productData as $v){
                $html .= '<li>'.$v->slug. '</li>';
            }
        }
        $html .= '</ul></div>';
        return response()->json($html);
    }


}

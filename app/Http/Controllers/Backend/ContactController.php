<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Communicate;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function view(){
        $data['alldata']=Contact::all();
        return view('Backend.Contact.contact-view',$data);
    }
    public function add(){
        return view('Backend.Contact.contact-add');
    }

    public function store(Request $request){

        $data=new Contact();
        $data->created_by=Auth::user()->id;
        $data->address=$request->address;
        $data->mobile_no=$request->mobile_no;
        $data->email=$request->email;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->youtube=$request->youtube;
        $data->google_plus=$request->google_plus;
        $data->save();
        return redirect()->route('contact.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=Contact::find($id);
        return view('Backend.Contact.edit-contact',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=Contact::find($id);
        $data->updated_by=Auth::user()->id;
        $data->address=$request->address;
        $data->mobile_no=$request->mobile_no;
        $data->email=$request->email;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->youtube=$request->youtube;
        $data->google_plus=$request->google_plus;
        $data->save();
        return redirect()->route('contact.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=Contact::find($id);
        $data->delete();
        return redirect()->route('contact.view')->with('success', 'Data Deleted Successfully.');
    }
    public function communicateview(){
        $alldata= Communicate::orderBy('id','desc')->get();
        return view('Backend.Contact.view-communicate',compact('alldata'));
    }
    public function communicatedelete($id){
        $data=Communicate::find($id);
        $data->delete();
        return redirect()->route('communicate.view')->with('success', 'Data Deleted Successfully.');
    }
}

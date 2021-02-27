<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' =>'required',
            'password' => 'required'
        ]);

        $email= $request->email;
        $password =$request->password;
        $validata=User::where('email',$email)->first();
        $pass_check=password_verify($password,@$validata->password);
        if(($pass_check || $validata )!= true){
            return redirect()->back()->with('message','Email OR Password doesnot match.');
        }
        if($validata->status=='0'){
            return redirect()->back()->with('message','Sorry You are not veryfied yet.');
        }
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('login');
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

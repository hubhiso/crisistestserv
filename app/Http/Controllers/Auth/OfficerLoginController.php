<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class OfficerLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:officer' , ['except' => ['logout']]);
    }

    public function ShowLoginForm()
    {
        return view('auth.officer-login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

       if( Auth::guard('officer')->attempt(['username' => $request->username , 'password' => $request->password ]
           , $request->remember)){

           return redirect()->intended(route('officer.main'));
       }

       return redirect()->back()->withInput($request->only('username','remember'));
    }

    public  function  logout()
    {

        Auth::guard('officer')->logout();

        return redirect('officer');
    }
}

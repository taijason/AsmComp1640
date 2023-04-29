<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
//use Hash;
use Illuminate\Support\Facades\Hash;
//use Session;


class UserController extends Controller
{
    public function register()
    {
        return view('customer.register');
    }

    public function login()
    {
        return view('customer.login');
    }

    public function registerProcess(Request $request)
    {
        $user = new User();
        //$user->userID = $request->username;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->userPhone = $request->phone;
        $res = $user->save();
        if($res) {
            return back()->with('success', 'You have registered successfully!');
        } else {
            return back()->with('fail', 'Oh No! Something wrong!!!');
        }
    }

    public function loginProcess(Request $request)
    {
        //$user = User::where('email', '=', $request->username)->first();
       // $flag = Auth::attempt(['email' => $request->username, 'password' => $request->password]);
        //echo $user;
        if(Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
           // if(Hash::check($request->password, $user->username)) {
                $request->session()->put('loginID', $request->username);
                return redirect('ideas');
           // } else {
                //return back()->with('fail', 'Password not matches!');
            //}
        } else {
            return back()->with('fail', 'does not registered!');
        }
    }

    public function logout()
    {
        // if(Session::has('loginID')) {
        //     Session::pull('loginID');
        //     return redirect('login');
        // }
    }
}

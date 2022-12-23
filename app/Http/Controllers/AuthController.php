<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        # code...
        return view('pages.login');
    }
    
    public function showRegister()
    {
        # code...
        return view('pages.register');
    }
    public function PostRegister(Request $request)
    {
        # validate...
        // $validatedata = $request->validate([
        //     'name' =>'required|min:5|max:255',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password'=>'required|min:8|same:password'
        // ]);
        
        // if($validatedata->fails())
        // {
        //     return redirect('register')
        //     ->withErrors($validatedata)
        //     ->withInput();
        // }
        
        $user = User::create([
           'name'=> $request->name, 
           'email'=> $request->email, 
           'password'=> Hash::make($request->password), 
        ]);

        // dd($request->all());
        
        //login
        Auth::login($user);
        return back()->with('success', 'success login you');
    }

    public function PostLogin(Request $request)
    {
        # code validate...
        // dd($request->all());
        $details = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        
        #login
        if (Auth::attempt($details)) {
            # code...
            return redirect()->intended('/');
        }
        return back()->withErrors([
           'email' => 'Invalid Login Details',
            
        ]);
    }
    public function logout()
    {
        Auth::logout();   
        return redirect('register'); 
    } 
}
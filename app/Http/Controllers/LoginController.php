<?php


namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // $pass = Hash::make('123456');
        // echo $pass;
 
         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
           return view('Backend.dashboard');
         }
 
         return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
      ]);
    }


    //logout

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
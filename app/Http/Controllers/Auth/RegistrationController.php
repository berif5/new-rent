<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lessor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 


class RegistrationController extends Controller
{
    public function sign_action(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',

        ]);

        $user = new User;

        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->password);

        

      


        $user->role_id = 1; // Assign user rule ID
        $user->save();
        return redirect('index');
    }

       

    public function sign_lessor(Request $req){
        // dd("yes");
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:lessors|email',
            'phone_number' => 'required|starts_with:07|digits_between:10,10',
            'address' => 'required',
            'city' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',

        ]);
       

        $lessor = new Lessor();

        $lessor->name = $req->input('name');
        $lessor->email = $req->input('email');
        $lessor->phone_number = $req->input('phone_number');
        $lessor->address = $req->input('address');
        $lessor->city = $req->input('city');
        $lessor->password = Hash::make($req->password);

 

        $lessor->role_id = 3; // Assign user rule ID
        
        $lessor->save();
        // dd(redirect('index'));
        return redirect('lessor.index');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        
        $user = User::where('name', $credentials['name'])
        ->where('email', $credentials['email'])->where('role_id' , 1)
        ->first();

        $admin = User::where('name', $credentials['name'])
        ->where('email', $credentials['email'])->where('role_id' , 2)
        ->first();

        $lessor = Lessor::where('name', $credentials['name'])
        ->where('email', $credentials['email'])
        ->first();

        // Authenticate the user
        if ($user) {
            // Authentication successful, store user data in session
            Auth::login($user);
            $request->session()->regenerate();

            return "yaa";
        }  //redirect()->intended('/dashboard')
        elseif ($admin) {
            // Authentication successful, store user data in session
            Auth::login($admin);
            $request->session()->regenerate();

            return redirect()->back();
        }
         elseif ($lessor){
            Auth::login($lessor);
            $request->session()->regenerate();

            return redirect()->intended('/lessor');  

         }
        // Authentication failed, redirect back with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}


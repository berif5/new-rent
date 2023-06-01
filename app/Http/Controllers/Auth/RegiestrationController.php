<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lessor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegiestrationController extends Controller
{
    public function sign_action(Request $req)
    {
        $def = 'public/images/user.png';
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
        $user->image = $def;

        $user->role_id = 1; // Assign user rule ID
        $user->save();
        return redirect('index');
    }

    public function sign_lesson(Request $req){

        $def = 'public/images/user.png';

        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => ['required', 'regex:/^(\\+962|0)7[79]\\d{7}$/'],            'address' => 'required',
            'city' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',

        ]);   dd($validated);

        $lessor = new Lessor();

        $lessor->name = $req->input('name');
        $lessor->email = $req->input('email');
        $lessor->phone_number = $req->input('phone');
        $lessor->address = $req->input('address');
        $lessor->city = $req->input('city');
        $lessor->password = Hash::make($req->password);


        $lessor->img = $def;

        $lessor->role_id = 3; // Assign user rule ID
        $lessor->save();
        return redirect('index');
    }
}


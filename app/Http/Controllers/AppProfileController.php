<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AppProfileController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return view('admin.layout1.profile', compact('users'));

    }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layout1.index');
    }

    public function showProfile()
    {


        return view('admin.layout1.app-profile');
    }

}

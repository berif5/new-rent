<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404); // Or handle the case when the user is not found
        }

        return view('user.profile', ['user' => $user]);
    }

    public function edit($id)
{
    $user = User::find($id);

    if (!$user) {
        abort(404); // Or handle the case when the user is not found
    }

    return view('user.edit', compact('user'));
}

}


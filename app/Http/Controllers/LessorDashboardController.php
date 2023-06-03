<?php

namespace App\Http\Controllers;
use App\Models\Lessor;

use Illuminate\Http\Request;

class LessorDashboardController extends Controller
{
    public function index()
    {
        $lessors = Lessor::paginate(4);
        // $lessors = Lessor::all();
        return view('admin.lessordashboard.index', compact('lessors'));
    }

    public function show($id)
    {
        $lessor = Lessor::find($id);
        return view('admin.lessordashboard.show', compact('lessor'));
    }

    public function edit($id)
    {
        $lessor = Lessor::find($id);
        return view('admin.lessordashboard.edit', compact('lessor'));
    }

    public function update(Request $request, $id)
    {
        $lessor = Lessor::find($id);
        $lessor->name = $request->input('name');
        $lessor->email = $request->input('email');
        $lessor->password = $request->input('password');
        $lessor->phone_number = $request->input('phone_number');
        $lessor->address = $request->input('address');
        $lessor->city = $request->input('city');
        $lessor->image = $request->input('image');


        $lessor->save();

        return redirect()->route('lessordashboard.show', $lessor->id)
            ->with('success', 'lessor updated successfully');
    }

    public function destroy($id)
    {
        $lessor = Lessor::find($id);
        $lessor->delete();

        return redirect()->route('lessordashboard.index')
            ->with('success', 'lessor deleted successfully');
    }
}



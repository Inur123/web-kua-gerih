<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
     public function index()
    {
        return view('user.survey');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'feedback' => 'nullable|string',
        ]);

        Survey::create($request->all());

        return redirect()->back()->with('success', 'Terima kasih sudah mengisi survei!');
    }

}

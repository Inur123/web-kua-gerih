<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function index()
    {

        $surveys = Survey::latest()->paginate(10);
        $stat = [
    'total' => Survey::count(),
    'avg' => Survey::avg('rating'),
    'most' => Survey::select('rating')->groupBy('rating')->orderByRaw('COUNT(*) DESC')->value('rating'),
    'chart' => [
        Survey::where('rating', 1)->count(),
        Survey::where('rating', 2)->count(),
        Survey::where('rating', 3)->count(),
        Survey::where('rating', 4)->count(),
        Survey::where('rating', 5)->count(),
    ]
];
        return view('admin.survey.index', compact('surveys','stat'));
    }

    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('admin.survey.edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'feedback' => 'nullable|string',
        ]);

        $survey = Survey::findOrFail($id);
        $survey->update($request->all());

        return redirect()->route('admin.survey.index')->with('success', 'Survey berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();

        return redirect()->route('admin.survey.index')->with('success', 'Survey berhasil dihapus!');
    }
}

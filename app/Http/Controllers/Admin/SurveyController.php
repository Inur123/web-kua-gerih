<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
   public function index(Request $request)
{
    // Ambil tahun dari request, default tahun sekarang
    $year = $request->get('year', now()->year);

    // Filter data survey berdasarkan tahun
    $surveys = Survey::whereYear('created_at', $year)
        ->latest()
        ->paginate(10);

    $stat = [
        'total' => Survey::whereYear('created_at', $year)->count(),
        'avg'   => Survey::whereYear('created_at', $year)->avg('rating'),
        'most'  => Survey::whereYear('created_at', $year)
            ->select('rating')
            ->groupBy('rating')
            ->orderByRaw('COUNT(*) DESC')
            ->value('rating'),
        'chart' => [
            Survey::whereYear('created_at', $year)->where('rating', 1)->count(),
            Survey::whereYear('created_at', $year)->where('rating', 2)->count(),
            Survey::whereYear('created_at', $year)->where('rating', 3)->count(),
            Survey::whereYear('created_at', $year)->where('rating', 4)->count(),
            Survey::whereYear('created_at', $year)->where('rating', 5)->count(),
        ]
    ];

    return view('admin.survey.index', compact('surveys', 'stat', 'year'));
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

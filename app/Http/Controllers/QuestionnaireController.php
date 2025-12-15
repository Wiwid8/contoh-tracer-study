<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::all();
        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
        ]);

        Questionnaire::create([
            'title' => $request->title,
            'questions' => json_encode($request->questions),
        ]);

        return redirect()->route('admin.questionnaires.index')->with('success', 'Kuesioner berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
        ]);

        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->update([
            'title' => $request->title,
            'questions' => json_encode($request->questions),
        ]);

        return redirect()->route('admin.questionnaires.index')->with('success', 'Kuesioner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->delete();
        return redirect()->route('admin.questionnaires.index')->with('success', 'Kuesioner berhasil dihapus!');
    }
}

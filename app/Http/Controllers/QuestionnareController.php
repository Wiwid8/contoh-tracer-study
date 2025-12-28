<?php

namespace App\Http\Controllers;

use App\Models\Category; // berfungsi memanggil model
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk mengakses database secara langsung

class QuestionnaireController extends Controller
{
    public function index()
    {
        // Untuk mengambil semua kuesioner beserta kategori
        $questionnaires = Questionnaire::with('category')->get();

        // untuk memanggil halaman admin dan memanggil variabel (mengirim data ke view admin)
        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    public function store(Request $request)
    {
        // untuk melakukan validasi berdasarkan kolom yang terdapat pada tabel
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'required_status' => 'required|boolean',
            'status' => 'required|in:active,inactive',
            'questions' => 'required|array|min:1',
            'questions.*.question_text' => 'required|string',
            'questions.*.answer_type' => 'required|in:text,number,choice,multiple_choice,matrix',
        ]);

        // Semua proses di dalam DB::transaction() harus berhasil semua atau gagal semua
        DB::transaction(function () use ($request) {

            // Simpan kuesioner
            $questionnaire = Questionnaire::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'required_status' => $request->required_status,
                'status' => $request->status,
            ]);

            // Simpan pertanyaan
            foreach ($request->questions as $index => $question) {
                Question::create([
                    'questionnaire_id' => $questionnaire->id,
                    'code' => 'Q' . ($index + 1),
                    'question_text' => $question['question_text'],
                    'answer_type' => $question['answer_type'],
                    'required_status' => true,
                ]);
            }
        });

        return redirect()
            ->route('admin.questionnaires.index')
            ->with('success', 'Kuesioner berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'required_status' => 'required|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        // untuk mencari 1 data kuesioner di tabel questionnaires berdasarkan primary key (id)
        // Kalau tidak ketemu → langsung error 404
        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'required_status' => $request->required_status,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.questionnaires.index')
            ->with('success', 'Kuesioner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        // melakukan proses hapus data dari tabel (Data pertanyaan ikut terhapus karena relasi cascade)
        $questionnaire->delete();

        return redirect()
            ->route('admin.questionnaires.index')
            ->with('success', 'Kuesioner berhasil dihapus!');
    }
}


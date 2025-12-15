<?php

namespace App\Http\Controllers;

use App\Models\Mentorship;
use Illuminate\Http\Request;

class MentorshipController extends Controller
{
    public function index()
    {
        $mentorships = Mentorship::with('mentor', 'mentee')->get();
        return view('mentorship.index', compact('mentorships'));
    }

    public function create()
    {
        return view('mentorship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:users,id',
            'mentee_id' => 'required|exists:users,id|different:mentor_id',
        ]);

        Mentorship::create($request->only(['mentor_id', 'mentee_id']));
        return redirect()->route('mentorship.index')->with('success', 'Mentorship berhasil dibuat!');
    }

    public function show($id)
    {
        $mentorship = Mentorship::with('mentor', 'mentee')->findOrFail($id);
        return view('mentorship.show', compact('mentorship'));
    }

    public function edit($id)
    {
        $mentorship = Mentorship::findOrFail($id);
        return view('mentorship.edit', compact('mentorship'));
    }

    public function update(Request $request, $id)
    {
        $mentorship = Mentorship::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,accepted,completed',
        ]);

        $mentorship->update($request->only(['status']));
        return redirect()->route('mentorship.index')->with('success', 'Status mentorship diperbarui!');
    }

    public function destroy($id)
    {
        $mentorship = Mentorship::findOrFail($id);
        $mentorship->delete();
        return redirect()->route('mentorship.index')->with('success', 'Mentorship berhasil dihapus!');
    }

    // Metode khusus untuk alumni request mentorship
    public function request(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:users,id',
        ]);

        Mentorship::create([
            'mentor_id' => $request->mentor_id,
            'mentee_id' => auth()->id(),
        ]);

        return redirect()->route('mentorship.index')->with('success', 'Permintaan mentorship dikirim!');
    }
}

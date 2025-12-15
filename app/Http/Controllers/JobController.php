<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::with('poster')->latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        JobPosting::create([
            'title' => $request->title,
            'description' => $request->description,
            'company' => $request->company,
            'location' => $request->location,
            'posted_by' => auth()->id(),
        ]);

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil diposting!');
    }

    public function show($id)
    {
        $job = JobPosting::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = JobPosting::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = JobPosting::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $job->update($request->only(['title', 'description', 'company', 'location']));
        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $job = JobPosting::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil dihapus!');
    }
}

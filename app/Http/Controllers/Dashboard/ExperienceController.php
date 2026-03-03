<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExperienceRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->has('status');
        Experience::create($validated);
        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $validated = $request->validated();
        // If the user checks 'is_current' or similar and ignores end_date, ensure end_date is handled
        $experience->update($validated);
        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('order', 'asc')->latest()->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->has('status');
        Skill::create($validated);
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();
        $validated['status'] = $request->has('status');
        $skill->update($validated);
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill deleted successfully.');
    }
}

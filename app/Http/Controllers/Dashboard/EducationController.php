<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $request->has('status');
        Education::create($validated);
        return redirect()->route('dashboard.education.index')->with('success', 'Education created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        return view('admin.education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $validated = $request->validated();
        $validated['status'] = $request->has('status');
        $education->update($validated);
        return redirect()->route('dashboard.education.index')->with('success', 'Education updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('dashboard.education.index')->with('success', 'Education deleted successfully.');
    }
}

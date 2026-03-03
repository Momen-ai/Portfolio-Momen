<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('client_image')) {
            $validated['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $validated['status'] = $request->has('status');

        Testimonial::create($validated);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $validated['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $validated['status'] = $request->has('status');

        $testimonial->update($validated);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }
        
        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}

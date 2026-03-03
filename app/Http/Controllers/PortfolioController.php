<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', true)
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->get();

        $skills = Skill::where('status', true)
            ->orderBy('order', 'asc')
            ->get()
            ->groupBy('category');

        $experiences = Experience::where('status', true)
            ->orderBy('start_date', 'desc')
            ->get();

        $education = Education::where('status', true)
            ->orderBy('start_date', 'desc')
            ->get();

        $testimonials = Testimonial::where('status', true)
            ->latest()
            ->get();

        return view('index', compact('projects', 'skills', 'experiences', 'education', 'testimonials'));
    }
}

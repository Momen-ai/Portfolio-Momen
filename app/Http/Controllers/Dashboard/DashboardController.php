<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'messages_count' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'projects_count' => Project::count(),
            'skills_count' => Skill::count(),
            'education_count' => Education::count(),
            'experience_count' => Experience::count(),
        ];

        $recent_messages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages'));
    }
}

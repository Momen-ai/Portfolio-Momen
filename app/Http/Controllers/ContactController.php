<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'full_name' => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'],
            'subject'   => $validated['subject'],
            'message'   => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

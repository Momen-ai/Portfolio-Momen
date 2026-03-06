<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $messageData = [
            'full_name' => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'],
            'subject'   => $validated['subject'],
            'message'   => $validated['message'],
        ];

        // Save to database
        Message::create($messageData);

        // Send Email
        try {
            Mail::to('mumenrami1411@gmail.com')->send(new ContactMessageMail($messageData));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Email sending failed: ' . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully!'
            ]);
        }

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

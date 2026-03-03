<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('dashboard.messages.index')->with('success', 'Message deleted successfully.');
    }

    /**
     * Mark the message as read.
     */
    public function markAsRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->route('dashboard.messages.index')->with('success', 'Message marked as read.');
    }
}

<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>Message Details</h2>
        <a href="{{ route('dashboard.messages.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $message->subject }}</h5>
            @if ($message->is_read)
                <span class="badge bg-secondary">Read</span>
            @else
                <span class="badge bg-warning text-dark">Unread</span>
            @endif
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>From:</strong> {{ $message->full_name }}
                </div>
                <div class="col-md-4">
                    <strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </div>
                <div class="col-md-4">
                    <strong>Phone:</strong> {{ $message->phone ?? 'N/A' }}
                </div>
            </div>

            <hr>

            <div class="mb-4">
                <strong>Message:</strong>
                <div class="p-3 bg-light border rounded mt-2" style="white-space: pre-wrap;">{{ $message->message }}</div>
            </div>

            <div class="text-muted small">
                Received on: {{ $message->created_at->format('M d, Y H:i A') }}
            </div>
        </div>
        <div class="card-footer d-flex gap-2">
            @if (!$message->is_read)
                <form action="{{ route('dashboard.messages.markAsRead', $message->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Mark as Read</button>
                </form>
            @endif

            <form action="{{ route('dashboard.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
        </div>
    </div>
</x-app-layout>

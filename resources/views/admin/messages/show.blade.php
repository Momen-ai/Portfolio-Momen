@extends('layouts.admin')

@section('page_title', 'Message Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card mb-4">
            <div class="d-flex justify-content-between align-items-start mb-4 border-bottom border-secondary pb-4">
                <div>
                    <h3 class="fw-bold mb-1">{{ $message->subject }}</h3>
                    <p class="text-muted mb-0">From: <span class="text-white">{{ $message->full_name }}</span> ({{ $message->email }})</p>
                    @if($message->phone)
                        <p class="text-muted small mt-1"><i class="fas fa-phone me-1"></i> {{ $message->phone }}</p>
                    @endif
                </div>
                <div class="text-end">
                    <span class="text-muted small d-block mb-2">{{ $message->created_at->format('M d, Y | h:i A') }}</span>
                    @if ($message->is_read)
                        <span class="badge bg-secondary">Read</span>
                    @else
                        <span class="badge badge-unread">New Message</span>
                    @endif
                </div>
            </div>

            <div class="message-body py-4" style="line-height: 1.8; font-size: 1.1rem; color: #ccc; white-space: pre-wrap;">
                {{ $message->message }}
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top border-secondary">
                <a href="{{ route('dashboard.messages.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Back to Inbox
                </a>

                <div class="d-flex gap-2">
                    @if (!$message->is_read)
                        <form method="POST" action="{{ route('dashboard.messages.markAsRead', $message->id) }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success px-4">
                                <i class="fas fa-check me-2"></i> Mark Read
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('dashboard.messages.destroy', $message->id) }}"
                        onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger px-4">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="custom-card" style="background: rgba(0, 171, 240, 0.05);">
            <h5 class="fw-bold mb-3">Quick Reply Info</h5>
            <p class="small text-muted mb-4">You can reach out to <strong>{{ $message->full_name }}</strong> via their email at <a href="mailto:{{ $message->email }}" class="text-info">{{ $message->email }}</a>.</p>
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i> Compose Reply
            </a>
        </div>
    </div>
</div>
@endsection

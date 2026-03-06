@extends('layouts.admin')

@section('page_title', 'Messages Management')

@section('content')
<div class="custom-card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 80px">ID</th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr style="{{ !$message->is_read ? 'background: rgba(0, 234, 255, 0.03);' : '' }}">
                        <td class="text-muted">#{{ $message->id }}</td>
                        <td>
                            <div class="fw-bold">{{ $message->full_name }}</div>
                            <div class="small text-muted">{{ $message->email }}</div>
                        </td>
                        <td>{{ Str::limit($message->subject, 40) }}</td>
                        <td class="small">{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($message->is_read)
                                <span class="badge bg-secondary opacity-50">Read</span>
                            @else
                                <span class="badge badge-unread"><i class="fas fa-circle me-1 small"></i> New</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-info rounded-circle" 
                                   title="View Message"
                                   href="{{ route('dashboard.messages.show', $message->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                @if (!$message->is_read)
                                    <form method="POST" action="{{ route('dashboard.messages.markAsRead', $message->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-success rounded-circle" title="Mark as Read">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif

                                <form method="POST" action="{{ route('dashboard.messages.destroy', $message->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-circle" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block opacity-20"></i>
                            No messages received yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($messages->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection

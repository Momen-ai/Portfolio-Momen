<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Messages Management</h4>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($messages as $message)
                        <tr class="{{ !$message->is_read ? 'table-light fw-bold' : '' }}">
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->full_name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone ?? 'N/A' }}</td>
                            <td>
                                @if ($message->is_read)
                                    <span class="badge bg-secondary">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unread</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-info text-white"
                                        href="{{ route('dashboard.messages.show', $message->id) }}">
                                        View
                                    </a>
                                    
                                    @if (!$message->is_read)
                                        <form method="POST"
                                            action="{{ route('dashboard.messages.markAsRead', $message->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-success">
                                                Mark Read
                                            </button>
                                        </form>
                                    @endif

                                    <form method="POST"
                                        action="{{ route('dashboard.messages.destroy', $message->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted py-4">
                                No messages found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($messages->hasPages())
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    @endif
</x-app-layout>

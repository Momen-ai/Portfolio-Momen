<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Experiences Management</h4>

            <a href="{{ route('dashboard.experiences.create') }}" class="btn btn-success">
                Add Experience
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Period</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($experiences as $experience)
                        <tr>
                            <td>{{ $experience->id }}</td>
                            <td class="fw-semibold">{{ $experience->position }}</td>
                            <td>{{ $experience->company }}</td>
                            <td>
                                {{ $experience->start_date->format('M Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                            </td>
                            <td>
                                @if ($experience->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                                @if (is_null($experience->end_date))
                                    <span class="badge bg-info">Current</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.experiences.edit', $experience->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('dashboard.experiences.destroy', $experience->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this experience?');">
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
                                No experiences found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($experiences->hasPages())
        <div class="mt-4">
            {{ $experiences->links() }}
        </div>
    @endif
</x-app-layout>

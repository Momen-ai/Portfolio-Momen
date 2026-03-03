<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Education Management</h4>

            <a href="{{ route('dashboard.education.create') }}" class="btn btn-success">
                Add Education
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Degree</th>
                        <th>Institution</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($educations as $education)
                        <tr>
                            <td>{{ $education->id }}</td>
                            <td class="fw-semibold">{{ $education->degree }}</td>
                            <td>{{ $education->institution }}</td>
                            <td>
                                {{ $education->start_date->format('Y') }} - 
                                {{ $education->end_date ? $education->end_date->format('Y') : 'Present' }}
                            </td>
                            <td>
                                @if ($education->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                                @if (is_null($education->end_date))
                                    <span class="badge bg-info">Current</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.education.edit', $education->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('dashboard.education.destroy', $education->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this education record?');">
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
                                No education records found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($educations->hasPages())
        <div class="mt-4">
            {{ $educations->links() }}
        </div>
    @endif
</x-app-layout>

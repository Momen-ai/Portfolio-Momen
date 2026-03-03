<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Projects Management</h4>

            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-success">
                Add Project
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                @if ($project->image)
                                    <img src="{{ Storage::url($project->image) }}" alt="Project Image" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $project->title }}</td>
                            <td>
                                @if ($project->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                                @if ($project->is_featured)
                                    <span class="badge bg-info">Featured</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.projects.edit', $project->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('dashboard.projects.destroy', $project->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this project?');">
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
                            <td colspan="5" class="text-muted py-4">
                                No projects found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    @endif
</x-app-layout>

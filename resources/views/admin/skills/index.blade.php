<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Skills Management</h4>

            <a href="{{ route('dashboard.skills.create') }}" class="btn btn-success">
                Add Skill
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td class="fw-semibold">{{ $skill->name }}</td>
                            <td>{{ ucfirst($skill->category ?? 'General') }}</td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $skill->percentage }}%;" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $skill->percentage }}%
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($skill->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.skills.edit', $skill->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('dashboard.skills.destroy', $skill->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this skill?');">
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
                                No skills found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($skills->hasPages())
        <div class="mt-4">
            {{ $skills->links() }}
        </div>
    @endif
</x-app-layout>

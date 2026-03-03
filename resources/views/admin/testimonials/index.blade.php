<x-app-layout>
    <div class="card shadow-sm mb-4">
        {{-- Header --}}
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <h4 class="mb-0 fw-bold">Testimonials Management</h4>

            <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-success">
                Add Testimonial
            </a>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60px">ID</th>
                        <th>Client Name</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th style="width: 220px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td class="fw-semibold">
                                @if($testimonial->client_image)
                                    <img src="{{ Storage::url($testimonial->client_image) }}" alt="Avatar" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                @endif
                                {{ $testimonial->client_name }}
                            </td>
                            <td>{{ $testimonial->position ?? 'N/A' }}</td>
                            <td>
                                @if ($testimonial->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.testimonials.edit', $testimonial->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                        action="{{ route('dashboard.testimonials.destroy', $testimonial->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
                                No testimonials found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Pagination --}}
    @if ($testimonials->hasPages())
        <div class="mt-4">
            {{ $testimonials->links() }}
        </div>
    @endif
</x-app-layout>

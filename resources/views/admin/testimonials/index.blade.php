@extends('layouts.admin')

@section('page_title', 'Testimonials')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="custom-card d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">Client Testimonials</h5>
                <p class="text-muted small mb-0">Manage what people say about your work.</p>
            </div>
            <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add Testimonial
            </a>
        </div>
    </div>
</div>

<div class="custom-card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th>Client</th>
                    <th>Position</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td class="text-muted">#{{ $testimonial->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($testimonial->client_image)
                                    <img src="{{ asset('storage/' . $testimonial->client_image) }}"
                                         alt="{{ $testimonial->client_name }}"
                                         class="rounded-circle"
                                         style="width: 36px; height: 36px; object-fit: cover; border: 1px solid rgba(255,255,255,0.15);">
                                @else
                                    <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center"
                                         style="width: 36px; height: 36px; border: 1px dashed rgba(255,255,255,0.2);">
                                        <i class="fas fa-user text-muted" style="font-size: 12px;"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-bold">{{ $testimonial->client_name }}</div>
                                    <div class="small text-muted">{{ Str::limit($testimonial->feedback, 40) }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $testimonial->position ?? '—' }}</td>
                        <td>
                            @if($testimonial->rating)
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted opacity-25' }}" style="font-size: 11px;"></i>
                                @endfor
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            @if($testimonial->status)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10">Active</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-10">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-info rounded-circle"
                                   href="{{ route('dashboard.testimonials.edit', $testimonial->id) }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('dashboard.testimonials.destroy', $testimonial->id) }}"
                                      onsubmit="return confirm('Delete this testimonial?');">
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
                            <i class="fas fa-quote-right fa-3x mb-3 d-block opacity-20"></i>
                            No testimonials added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($testimonials->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection

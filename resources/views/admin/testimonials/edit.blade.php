@extends('layouts.admin')

@section('page_title', 'Edit Testimonial')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-edit text-info fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">Edit Testimonial</h4>
                    <p class="text-muted small mb-0">Update feedback from {{ $testimonial->client_name }}.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="client_name" id="client_name"
                               class="form-control @error('client_name') is-invalid @enderror"
                               value="{{ old('client_name', $testimonial->client_name) }}" required>
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="position" class="form-label">Position / Company</label>
                        <input type="text" name="position" id="position"
                               class="form-control @error('position') is-invalid @enderror"
                               value="{{ old('position', $testimonial->position) }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="feedback" class="form-label">Testimonial Message <span class="text-danger">*</span></label>
                    <textarea name="feedback" id="feedback" rows="5"
                              class="form-control @error('feedback') is-invalid @enderror"
                              required>{{ old('feedback', $testimonial->feedback) }}</textarea>
                    @error('feedback')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="client_image" class="form-label">Client Photo</label>
                        @if($testimonial->client_image)
                            <div class="mb-2 d-flex align-items-center gap-2">
                                <img src="{{ asset('storage/' . $testimonial->client_image) }}"
                                     alt="Current photo" class="rounded-circle"
                                     style="width: 48px; height: 48px; object-fit: cover; border: 1px solid rgba(255,255,255,0.2);">
                                <span class="small text-muted">Current photo</span>
                            </div>
                        @endif
                        <input type="file" name="client_image" id="client_image"
                               class="form-control @error('client_image') is-invalid @enderror"
                               accept="image/*">
                        <div class="form-text">Leave blank to keep the current photo.</div>
                        @error('client_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="rating" class="form-label">Rating (1–5)</label>
                        <input type="number" name="rating" id="rating" min="1" max="5"
                               class="form-control @error('rating') is-invalid @enderror"
                               value="{{ old('rating', $testimonial->rating) }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1"
                               {{ old('status', $testimonial->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Publish (Active)</label>
                    </div>
                </div>

                <div class="d-flex gap-3 border-top border-secondary pt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-check-circle me-2"></i> Update Testimonial
                    </button>
                    <a href="{{ route('dashboard.testimonials.index') }}" class="btn btn-secondary px-4 py-2">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('page_title', 'Add Testimonial')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-primary bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-plus text-primary fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">New Testimonial</h4>
                    <p class="text-muted small mb-0">Add client feedback to your portfolio.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="client_name" id="client_name"
                               class="form-control @error('client_name') is-invalid @enderror"
                               value="{{ old('client_name') }}" placeholder="e.g. John Smith" required>
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="position" class="form-label">Position / Company</label>
                        <input type="text" name="position" id="position"
                               class="form-control @error('position') is-invalid @enderror"
                               value="{{ old('position') }}" placeholder="e.g. CEO at Acme">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="feedback" class="form-label">Testimonial Message <span class="text-danger">*</span></label>
                    <textarea name="feedback" id="feedback" rows="5"
                              class="form-control @error('feedback') is-invalid @enderror"
                              placeholder="What did the client say about your work?" required>{{ old('feedback') }}</textarea>
                    @error('feedback')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="client_image" class="form-label">Client Photo</label>
                        <input type="file" name="client_image" id="client_image"
                               class="form-control @error('client_image') is-invalid @enderror"
                               accept="image/*">
                        @error('client_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="rating" class="form-label">Rating (1–5)</label>
                        <input type="number" name="rating" id="rating" min="1" max="5"
                               class="form-control @error('rating') is-invalid @enderror"
                               value="{{ old('rating', 5) }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1"
                               {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Publish (Active)</label>
                    </div>
                </div>

                <div class="d-flex gap-3 border-top border-secondary pt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-save me-2"></i> Save Testimonial
                    </button>
                    <a href="{{ route('dashboard.testimonials.index') }}" class="btn btn-secondary px-4 py-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

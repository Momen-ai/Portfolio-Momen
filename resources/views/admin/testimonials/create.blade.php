<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>New Testimonial</h2>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" required>
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="feedback" class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea name="feedback" id="feedback" rows="4" class="form-control @error('feedback') is-invalid @enderror" required>{{ old('feedback') }}</textarea>
                    @error('feedback')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="client_image" class="form-label">Client Image</label>
                        <input type="file" name="client_image" id="client_image" class="form-control @error('client_image') is-invalid @enderror">
                        @error('client_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" name="rating" id="rating" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-3">Save</button>
                <a href="{{ route('dashboard.testimonials.index') }}" class="btn btn-secondary px-3 ms-2">Cancel</a>
            </form>

        </div>
    </div>
</x-app-layout>

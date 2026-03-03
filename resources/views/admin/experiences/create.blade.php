<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>New Experience</h2>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.experiences.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="position" class="form-label">Job Title <span class="text-danger">*</span></label>
                        <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required>
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="company" class="form-label">Company <span class="text-danger">*</span></label>
                        <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" required>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date (Leave blank if current)</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-3">Save</button>
                <a href="{{ route('dashboard.experiences.index') }}" class="btn btn-secondary px-3 ms-2">Cancel</a>
            </form>

        </div>
    </div>
</x-app-layout>

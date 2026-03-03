<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>Edit Education: {{ $education->degree }} at {{ $education->institution }}</h2>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.education.update', $education->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="degree" class="form-label">Degree <span class="text-danger">*</span></label>
                        <input type="text" name="degree" id="degree" class="form-control @error('degree') is-invalid @enderror" value="{{ old('degree', $education->degree) }}" required>
                        @error('degree')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="institution" class="form-label">Institution <span class="text-danger">*</span></label>
                        <input type="text" name="institution" id="institution" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution', $education->institution) }}" required>
                        @error('institution')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $education->start_date ? $education->start_date->format('Y-m-d') : '') }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date (Leave blank if present)</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $education->end_date ? $education->end_date->format('Y-m-d') : '') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $education->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $education->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-3">Update</button>
                <a href="{{ route('dashboard.education.index') }}" class="btn btn-secondary px-3 ms-2">Cancel</a>
            </form>

        </div>
    </div>
</x-app-layout>

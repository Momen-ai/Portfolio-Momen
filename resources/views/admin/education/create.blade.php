@extends('layouts.admin')

@section('page_title', 'Add Education')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-primary bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-graduation-cap text-primary fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">New Educational Record</h4>
                    <p class="text-muted small mb-0">Add a degree or certification to your profile.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.education.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="degree" class="form-label">Degree / Certificate <span class="text-danger">*</span></label>
                    <input type="text" name="degree" id="degree" placeholder="e.g. B.Sc. in Software Engineering" 
                           class="form-control @error('degree') is-invalid @enderror" value="{{ old('degree') }}" required>
                    @error('degree')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="institution" class="form-label">Institution <span class="text-danger">*</span></label>
                    <input type="text" name="institution" id="institution" placeholder="e.g. Al-Azhar University" 
                           class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution') }}" required>
                    @error('institution')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" 
                               class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date (Keep empty if ongoing)</label>
                        <input type="date" name="end_date" id="end_date" 
                               class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Description (Optional)</label>
                    <textarea name="description" id="description" rows="4" placeholder="Briefly describe your achievements..." 
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="form-check form-switch p-0 d-flex align-items-center gap-3">
                        <input class="form-check-input ms-0" type="checkbox" name="status" id="status" value="1" 
                               style="width: 3rem; height: 1.5rem;"
                               {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label text-muted" for="status">Visible on Portfolio</label>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-save me-2"></i> Save Education
                    </button>
                    <a href="{{ route('dashboard.education.index') }}" class="btn btn-secondary px-4 py-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

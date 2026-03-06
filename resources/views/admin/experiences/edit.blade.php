@extends('layouts.admin')

@section('page_title', 'Edit Experience')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-edit text-info fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">Update Career Milestone</h4>
                    <p class="text-muted small mb-0">Modify your professional experience details.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.experiences.update', $experience->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="position" class="form-label">Job Title / Position <span class="text-danger">*</span></label>
                    <input type="text" name="position" id="position" 
                           class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $experience->position) }}" required>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="company" class="form-label">Company / Organization <span class="text-danger">*</span></label>
                    <input type="text" name="company" id="company" 
                           class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $experience->company) }}" required>
                    @error('company')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" 
                               class="form-control @error('start_date') is-invalid @enderror" 
                               value="{{ old('start_date', $experience->start_date->format('Y-m-d')) }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date (Keep empty if current)</label>
                        <input type="date" name="end_date" id="end_date" 
                               class="form-control @error('end_date') is-invalid @enderror" 
                               value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Key Responsibilities (Optional)</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $experience->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="form-check form-switch p-0 d-flex align-items-center gap-3">
                        <input class="form-check-input ms-0" type="checkbox" name="status" id="status" value="1" 
                               style="width: 3rem; height: 1.5rem;"
                               {{ old('status', $experience->status) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label text-muted" for="status">Visible on Portfolio</label>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-check-circle me-2"></i> Update Experience
                    </button>
                    <a href="{{ route('dashboard.experiences.index') }}" class="btn btn-secondary px-4 py-2">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

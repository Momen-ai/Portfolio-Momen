@extends('layouts.admin')

@section('page_title', 'Edit Skill')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-edit text-info fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">Modify Skill</h4>
                    <p class="text-muted small mb-0">Update your expertise details.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Skill Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" 
                           class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $skill->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="technical" {{ old('category', $skill->category) == 'technical' ? 'selected' : '' }}>Technical</option>
                            <option value="professional" {{ old('category', $skill->category) == 'professional' ? 'selected' : '' }}>Professional</option>
                            <option value="general" {{ old('category', $skill->category) == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="percentage" class="form-label">Proficiency (%) <span class="text-danger">*</span></label>
                        <input type="number" name="percentage" id="percentage" min="0" max="100" 
                               class="form-control @error('percentage') is-invalid @enderror" value="{{ old('percentage', $skill->percentage) }}" required>
                        @error('percentage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <div class="form-check form-switch p-0 d-flex align-items-center gap-3">
                        <input class="form-check-input ms-0" type="checkbox" name="status" id="status" value="1" 
                               style="width: 3rem; height: 1.5rem;"
                               {{ old('status', $skill->status) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label text-muted" for="status">Visible on Portfolio</label>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-check-circle me-2"></i> Update Changes
                    </button>
                    <a href="{{ route('dashboard.skills.index') }}" class="btn btn-secondary px-4 py-2">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

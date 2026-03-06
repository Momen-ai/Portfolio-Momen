@extends('layouts.admin')

@section('page_title', 'Edit Project')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="custom-card">
            <div class="d-flex align-items-center mb-5">
                <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                    <i class="fas fa-edit text-info fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-1 fw-bold">Update Project</h4>
                    <p class="text-muted small mb-0">Refine your project presentation.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" 
                                   class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Project Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" rows="6" 
                                      class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" name="category" id="category" 
                                       class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $project->category) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="client" class="form-label">Client / Organization</label>
                                <input type="text" name="client" id="client" 
                                       class="form-control @error('client') is-invalid @enderror" value="{{ old('client', $project->client) }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-4">
                            <label for="image" class="form-label">Project Image</label>
                            <div class="image-upload-wrapper text-center p-4 rounded-4" style="background: rgba(255,255,255,0.03); border: 2px dashed rgba(255,255,255,0.1);">
                                @if($project->image)
                                    <div id="image-current" class="mb-3">
                                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded-3 shadow">
                                        <p class="small text-muted mt-2">Current Image</p>
                                    </div>
                                @else
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                @endif
                                
                                <input type="file" name="image" id="image" class="form-control d-none @error('image') is-invalid @enderror" onchange="previewImage(event)">
                                <label for="image" class="btn btn-sm btn-outline-info">Change Image</label>
                                <div id="image-preview" class="mt-3 d-none">
                                    <img src="" class="img-fluid rounded-3 shadow border border-info">
                                    <p class="small text-info mt-2">New Preview</p>
                                </div>
                            </div>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="link" class="form-label">Live Preview Link</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-link"></i></span>
                                <input type="url" name="link" id="link" 
                                       class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $project->link) }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="github_link" class="form-label">GitHub Repository</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-muted"><i class="fab fa-github"></i></span>
                                <input type="url" name="github_link" id="github_link" 
                                       class="form-control @error('github_link') is-invalid @enderror" value="{{ old('github_link', $project->github_link) }}">
                            </div>
                        </div>

                        <div class="custom-card p-3 bg-opacity-10 border-0 mb-4" style="background: rgba(0, 171, 240, 0.05);">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $project->status) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Publish Live</label>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Feature on Home</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3 border-top border-secondary pt-5 mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2">
                        <i class="fas fa-check-circle me-2"></i> Update Project
                    </button>
                    <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary px-4 py-2">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');
    const current = document.getElementById('image-current');
    const img = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('d-none');
            if(current) current.classList.add('opacity-50');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

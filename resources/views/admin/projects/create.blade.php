<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>New Project</h2>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="github_url" class="form-label">GitHub URL</label>
                        <input type="url" name="github_url" id="github_url" class="form-control @error('github_url') is-invalid @enderror" value="{{ old('github_url') }}">
                        @error('github_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="demo_url" class="form-label">Demo URL</label>
                        <input type="url" name="demo_url" id="demo_url" class="form-control @error('demo_url') is-invalid @enderror" value="{{ old('demo_url') }}">
                        @error('demo_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Featured Project</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active (Show on website)</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-3">Save</button>
                <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary px-3 ms-2">Cancel</a>
            </form>

        </div>
    </div>
</x-app-layout>

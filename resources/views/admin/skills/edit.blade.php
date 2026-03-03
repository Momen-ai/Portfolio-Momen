<x-app-layout>
    <div class="flex items-center justify-between mb-4">
        <h2>Edit Skill: {{ $skill->name }}</h2>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $skill->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Type <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Select Type</option>
                            <option value="technical" {{ old('category', $skill->category) == 'technical' ? 'selected' : '' }}>Technical</option>
                            <option value="professional" {{ old('category', $skill->category) == 'professional' ? 'selected' : '' }}>Professional</option>
                            <option value="general" {{ old('category', $skill->category) == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="percentage" class="form-label">Percentage (0-100) <span class="text-danger">*</span></label>
                        <input type="number" name="percentage" id="percentage" min="0" max="100" class="form-control @error('percentage') is-invalid @enderror" value="{{ old('percentage', $skill->percentage) }}" required>
                        @error('percentage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $skill->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-3">Update</button>
                <a href="{{ route('dashboard.skills.index') }}" class="btn btn-secondary px-3 ms-2">Cancel</a>
            </form>

        </div>
    </div>
</x-app-layout>

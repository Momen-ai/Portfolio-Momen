@extends('layouts.admin')

@section('page_title', 'Projects Management')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="custom-card d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">Portfolio Showcase</h5>
                <p class="text-muted small mb-0">Manage and highlight your best work.</p>
            </div>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add New Project
            </a>
        </div>
    </div>
</div>

<div class="custom-card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 80px">ID</th>
                    <th>Project Preview</th>
                    <th>Details</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td class="text-muted">#{{ $project->id }}</td>
                        <td style="width: 120px">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" 
                                     class="rounded-3 shadow-sm" style="width: 100px; height: 60px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                            @else
                                <div class="bg-dark rounded-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; border: 1px dashed rgba(255,255,255,0.2);">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $project->title }}</div>
                            <div class="small text-muted">{{ Str::limit($project->description, 50) }}</div>
                        </td>
                        <td>
                            <span class="badge bg-dark border border-secondary">{{ ucfirst($project->category ?? 'Web') }}</span>
                        </td>
                        <td>
                            @if ($project->status)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10">Live</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-10">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-info rounded-circle" 
                                   href="{{ route('dashboard.projects.edit', $project->id) }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form method="POST" action="{{ route('dashboard.projects.destroy', $project->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-circle" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-block opacity-20"></i>
                            No projects added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($projects->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection

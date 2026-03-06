@extends('layouts.admin')

@section('page_title', 'Skills Management')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="custom-card d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">Manage Your Expertise</h5>
                <p class="text-muted small mb-0">Drag and drop sorting coming soon.</p>
            </div>
            <a href="{{ route('dashboard.skills.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add New Skill
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
                    <th>Skill Name</th>
                    <th>Category</th>
                    <th style="width: 300px">Proficiency</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                    <tr>
                        <td class="text-muted">#{{ $skill->id }}</td>
                        <td class="fw-bold">{{ $skill->name }}</td>
                        <td>
                            <span class="badge bg-dark border border-secondary">{{ ucfirst($skill->category ?? 'General') }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="progress flex-grow-1" style="height: 8px; background: rgba(255,255,255,0.05);">
                                    <div class="progress-bar" role="progressbar" 
                                         style="width: {{ $skill->percentage }}%; background: linear-gradient(90deg, var(--main-color), var(--main-accent)); box-shadow: 0 0 10px var(--main-color);" 
                                         aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="small fw-bold">{{ $skill->percentage }}%</span>
                            </div>
                        </td>
                        <td>
                            @if ($skill->status)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-info rounded-circle" 
                                   href="{{ route('dashboard.skills.edit', $skill->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form method="POST" action="{{ route('dashboard.skills.destroy', $skill->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            No skills added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($skills->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $skills->links() }}
        </div>
    @endif
</div>
@endsection

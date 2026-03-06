@extends('layouts.admin')

@section('page_title', 'Education Management')

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="custom-card d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">Academic Background</h5>
                <p class="text-muted small mb-0">Manage your degrees and certifications.</p>
            </div>
            <a href="{{ route('dashboard.education.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add Education
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
                    <th>Degree / Certificate</th>
                    <th>Institution</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($educations as $edu)
                    <tr>
                        <td class="text-muted">#{{ $edu->id }}</td>
                        <td class="fw-bold">{{ $edu->degree }}</td>
                        <td>{{ $edu->institution }}</td>
                        <td>
                            <div class="small fw-500">
                                {{ $edu->start_date->format('M Y') }} — 
                                @if($edu->end_date)
                                    {{ $edu->end_date->format('M Y') }}
                                @else
                                    <span class="text-info">Present</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                @if ($edu->status)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-10">Hidden</span>
                                @endif
                                
                                @if (is_null($edu->end_date))
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-10">Ongoing</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-sm btn-outline-info rounded-circle" 
                                   href="{{ route('dashboard.education.edit', $edu->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form method="POST" action="{{ route('dashboard.education.destroy', $edu->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this education record?');">
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
                            No education records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($educations->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $educations->links() }}
        </div>
    @endif
</div>
@endsection

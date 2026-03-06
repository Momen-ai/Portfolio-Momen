@extends('layouts.admin')

@section('page_title', 'Dashboard Overview')

@section('content')
<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <i class="fas fa-envelope-open-text"></i>
        <h3>{{ $stats['unread_messages'] }}</h3>
        <p>Unread Messages</p>
        <div class="small mt-2" style="color: var(--main-accent)">Total: {{ $stats['messages_count'] }}</div>
    </div>

    <div class="stat-card">
        <i class="fas fa-project-diagram"></i>
        <h3>{{ $stats['projects_count'] }}</h3>
        <p>Active Projects</p>
    </div>

    <div class="stat-card">
        <i class="fas fa-brain"></i>
        <h3>{{ $stats['skills_count'] }}</h3>
        <p>Technical Skills</p>
    </div>

    <div class="stat-card">
        <i class="fas fa-graduation-cap"></i>
        <h3>{{ $stats['education_count'] }}</h3>
        <p>Certifications & Edu</p>
    </div>
</div>

<div class="row">
    <!-- Recent Messages -->
    <div class="col-lg-8 mb-4">
        <div class="custom-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold"><i class="fas fa-history me-2"></i> Recent Inquiries</h5>
                <a href="{{ route('dashboard.messages.index') }}" class="btn btn-sm btn-outline-info">View All</a>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_messages as $msg)
                            <tr>
                                <td class="fw-500">{{ $msg->full_name }}</td>
                                <td>{{ Str::limit($msg->subject, 30) }}</td>
                                <td class="small">{{ $msg->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($msg->is_read)
                                        <span class="badge bg-secondary opacity-50">Read</span>
                                    @else
                                        <span class="badge badge-unread">New</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">No messages yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-4 mb-4">
        <div class="custom-card h-100">
            <h5 class="mb-4 fw-bold"><i class="fas fa-bolt me-2"></i> Quick Actions</h5>
            
            <div class="d-grid gap-3">
                <a href="{{ route('dashboard.skills.create') }}" class="btn btn-primary d-flex align-items-center justify-content-between py-3 px-4">
                    <span>Add New Skill</span>
                    <i class="fas fa-plus"></i>
                </a>
                
                <a href="{{ route('dashboard.experiences.create') }}" class="btn btn-dark border-secondary d-flex align-items-center justify-content-between py-3 px-4">
                    <span>Add Experience</span>
                    <i class="fas fa-briefcase"></i>
                </a>

                <a href="{{ route('dashboard.education.create') }}" class="btn btn-dark border-secondary d-flex align-items-center justify-content-between py-3 px-4">
                    <span>Add Education</span>
                    <i class="fas fa-graduation-cap"></i>
                </a>
            </div>

            <div class="mt-5 p-4 rounded-4" style="background: rgba(0, 171, 240, 0.05); border: 1px dashed rgba(0, 171, 240, 0.2);">
                <p class="small text-muted mb-0 text-center">
                    <i class="fas fa-info-circle me-1"></i> Tip: Keep your portfolio updated regularly to attract better opportunities.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

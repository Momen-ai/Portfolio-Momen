<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard | Momen Rami</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    @stack('css')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/images/loge1.png') }}" alt="Logo" class="sidebar-logo">
            </a>
            <h5 class="mt-3 fw-bold">ADMIN PANEL</h5>
        </div>
        
        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                <span>Overview</span>
            </a>
            
            <a href="{{ route('dashboard.messages.index') }}" class="nav-item {{ request()->routeIs('dashboard.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Messages</span>
                @php $unread = \App\Models\Message::where('is_read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="badge bg-danger rounded-pill ms-auto">{{ $unread }}</span>
                @endif
            </a>

            <a href="{{ route('dashboard.skills.index') }}" class="nav-item {{ request()->routeIs('dashboard.skills.*') ? 'active' : '' }}">
                <i class="fas fa-brain"></i>
                <span>Skills</span>
            </a>

            <a href="{{ route('dashboard.experiences.index') }}" class="nav-item {{ request()->routeIs('dashboard.experiences.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>
                <span>Experience</span>
            </a>

            <a href="{{ route('dashboard.education.index') }}" class="nav-item {{ request()->routeIs('dashboard.education.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
            </a>

            <a href="{{ route('dashboard.testimonials.index') }}" class="nav-item {{ request()->routeIs('dashboard.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-quote-right"></i>
                <span>Testimonials</span>
            </a>

            <div class="mt-5 px-4 mb-2 small text-muted text-uppercase">Project</div>
            <a href="{{ route('dashboard.projects.index') }}" class="nav-item {{ request()->routeIs('dashboard.projects.*') ? 'active' : '' }}">
                <i class="fas fa-project-diagram"></i>
                <span>My Projects</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Nav -->
        <nav class="top-nav">
            <div class="d-flex align-items-center">
                <button class="btn text-white d-lg-none me-3" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0 fw-600">@yield('page_title', 'Dashboard')</h4>
            </div>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="avatar me-2 bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <span class="fw-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-secondary shadow">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-cog me-2"></i> Profile Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('index') }}" target="_blank"><i class="fas fa-external-link-alt me-2"></i> View Website</a></li>
                    <li><hr class="dropdown-divider border-secondary"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit">
                                <i class="fas fa-sign-out-alt me-2"></i> Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-dismissible fade show border-0 shadow mb-4" role="alert" style="background: rgba(0, 171, 240, 0.1); color: #00eaff;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-dismissible fade show border-0 shadow mb-4" role="alert" style="background: rgba(220, 53, 69, 0.12); color: #ff6b6b;">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Page Dynamic Content -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    @stack('js')
</body>
</html>

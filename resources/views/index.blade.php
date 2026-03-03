<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momen Rami | {{ __('home.hero.title') }}</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @if(app()->getLocale() == 'ar')
        <!-- Bootstrap 5.3 RTL CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                text-align: right;
            }
            .ms-auto { margin-right: auto !important; margin-left: 0 !important; }
            .me-auto { margin-left: auto !important; margin-right: 0 !important; }
            .header .navbar-nav { gap: 1rem; }
            .navbar-nav .nav-link { font-size: 1rem; }
        </style>
    @else
        <!-- Bootstrap 5.3 LTR CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <style>
        .lang-switch-btn {
            background: transparent;
            border: 1px solid var(--main-color);
            color: var(--white-color);
            padding: 5px 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            font-weight: 500;
        }
        .lang-switch-btn:hover {
            background: var(--main-color);
            color: var(--bg-color);
            transform: translateY(-2px);
        }
        [dir="rtl"] .education-box {
            border-left: none !important;
            border-right: 2px solid var(--main-color) !important;
            padding-left: 0 !important;
            padding-right: 1.5rem !important;
        }
        [dir="rtl"] .education-content::before {
            left: auto !important;
            right: -31px !important;
        }
    </style>
</head>

<body>
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark px-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="#">Momen {/}</a>
                
                <div class="d-flex align-items-center d-lg-none">
                    @if(app()->getLocale() == 'en')
                        <a href="{{ route('lang.switch', 'ar') }}" class="lang-switch-btn me-2">
                             <i class="fas fa-globe"></i> AR
                        </a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}" class="lang-switch-btn me-2">
                             <i class="fas fa-globe"></i> EN
                        </a>
                    @endif
                    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">{{ __('home.nav.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">{{ __('home.nav.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#education">{{ __('home.nav.education') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#skills">{{ __('home.nav.skills') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">{{ __('home.nav.projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">{{ __('home.nav.testimonials') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">{{ __('home.nav.contact') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none d-lg-block">
                    @if(app()->getLocale() == 'en')
                        <a href="{{ route('lang.switch', 'ar') }}" class="lang-switch-btn">
                            <i class="fas fa-globe"></i> العربية
                        </a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}" class="lang-switch-btn">
                            <i class="fas fa-globe"></i> English
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <section class="home d-flex align-items-center" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 home-content">
                    <h2>{{ __('home.hero.greeting') }} <span>Momen Abo Sall</span></h2>
                    <div class="text-animate">
                        <h3>{{ __('home.hero.title') }}</h3>
                    </div>
                    <p>{{ __('home.hero.description') }}</p>

                    <div class="btn-box">
                        <a href="#contact" class="btn me-3">{{ __('home.hero.hire_me') }}</a>
                        <a href="#contact" class="btn">{{ __('home.contact.subtitle') }}</a>
                    </div>

                    <div class="home-social mt-5">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 home-img-container">
                    <div class="home-img">
                        <img src="{{asset('assets/images/file_0000000044cc7243ae56e37cd49e7e59.png')}}" alt="Portrait"
                            class="portrait-img img-fluid">
                        <div class="img-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about d-flex flex-column justify-content-center align-items-center" id="about">
        <div class="container">
            <h2 class="heading">{{ __('home.about.about') }} <span>{{ __('home.about.title') }}</span></h2>
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-5 d-flex justify-content-center mb-5 mb-lg-0">
                    <div class="about-img">
                        <img src="{{asset('assets/images/74d36903-8ae6-4306-aa94-f2a0c1fa6681.jpg')}}" alt="Profile" class="img-fluid">
                        <span class="circle-spin"></span>
                    </div>
                </div>
                <div class="col-lg-7 about-content">
                    <h3>{{ __('home.about.subtitle') }}</h3>
                    <p>{{ __('home.about.description') }}</p>

                    <div class="btn-box">
                        <a href="#" class="btn">{{ __('home.about.read_more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="education" id="education">
        <div class="container">
            <h2 class="heading text-center mb-5">{{ __('home.resume.my') }} <span>{{ __('home.resume.title') }}</span></h2>
            <div class="row g-4">
                <div class="col-md-6 education-column">
                    <h3 class="title mb-4">{{ __('home.resume.education') }}</h3>
                    <div class="education-box border-start border-2 border-info ps-4">
                        @foreach ($education as $item)
                            <div class="education-content mb-4 p-4 border border-info rounded-3 position-relative">
                                <div class="year text-info mb-2">
                                    <i class="fas fa-calendar-alt me-2"></i> 
                                    {{ $item->start_date->format('Y') }} - {{ $item->end_date ? $item->end_date->format('Y') : __('home.resume.present') }}
                                </div>
                                <h3>{{ $item->degree }} - {{ $item->institution }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6 education-column">
                    <h3 class="title mb-4">{{ __('home.resume.experience') }}</h3>
                    <div class="education-box border-start border-2 border-info ps-4">
                        @foreach ($experiences as $item)
                            <div class="education-content mb-4 p-4 border border-info rounded-3 position-relative">
                                <div class="year text-info mb-2">
                                    <i class="fas fa-calendar-alt me-2"></i> 
                                    {{ $item->start_date->format('Y') }} - {{ $item->end_date ? $item->end_date->format('Y') : __('home.resume.present') }}
                                </div>
                                <h3>{{ $item->position }} - {{ $item->company }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="skills" id="skills">
        <div class="container">
            <h2 class="heading text-center mb-5">{{ __('home.skills.my') }} <span>{{ __('home.skills.title') }}</span></h2>
            <div class="row g-5">
                @foreach ($skills as $category => $skillList)
                    <div class="col-md-6 skills-column">
                        <h3 class="title mb-4">{{ $category }}</h3>
                        <div class="skills-box p-4 border border-info rounded-3">
                            <div class="skills-content">
                                @foreach ($skillList as $skill)
                                    <div class="progress-item mb-4">
                                        <h5 class="d-flex justify-content-between">{{ $skill->name }} <span>{{ $skill->percentage }}%</span></h5>
                                        <div class="progress bg-transparent border border-info" style="height: 20px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="--width: {{ $skill->percentage }}%;"
                                                aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="projects" id="projects" style="background: var(--bg-color); padding-bottom: 7rem;">
        <div class="container">
            <h2 class="heading text-center mb-5">{{ __('home.projects.latest') }} <span>{{ __('home.projects.title') }}</span></h2>
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="card bg-transparent border-info h-100 project-card overflow-hidden">
                            <img src="{{ $project->image ? Storage::url($project->image) : asset('assets/images/project-placeholder.jpg') }}" 
                                 class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-white">
                                <h5 class="card-title text-info">{{ $project->title }}</h5>
                                <p class="card-text small text-secondary">{{ Str::limit($project->description, 100) }}</p>
                                <div class="d-flex gap-2 mt-3">
                                    @if($project->demo_url)
                                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-sm btn-info">{{ __('home.projects.visit_site') }}</a>
                                    @endif
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-sm border-info text-white">{{ __('home.projects.github') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials" style="padding-bottom: 7rem;">
        <div class="container">
            <h2 class="heading text-center mb-5">{{ __('home.testimonials.client') }} <span>{{ __('home.testimonials.title') }}</span></h2>
            <div class="row g-4">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <div class="testimonial-box p-4 border border-info rounded-3 text-white text-center">
                            <img src="{{ $testimonial->client_image ? Storage::url($testimonial->client_image) : asset('assets/images/user-placeholder.png') }}" 
                                 class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid var(--main-color);">
                            <h4 class="text-info">{{ $testimonial->client_name }}</h4>
                            <p class="small text-secondary mb-2">{{ $testimonial->position }}</p>
                            <div class="rating mb-3 text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $testimonial->rating ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </div>
                            <p class="font-italic text-secondary">"{{ $testimonial->feedback }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <h2 class="heading text-center mb-5">{{ __('home.contact.contact') }} <span>{{ __('home.contact.title') }}</span></h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control bg-transparent border-info text-white p-3"
                                    placeholder="{{ __('home.contact.name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control bg-transparent border-info text-white p-3"
                                    placeholder="{{ __('home.contact.email') }}" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control bg-transparent border-info text-white p-3"
                                    placeholder="{{ __('home.contact.phone') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" class="form-control bg-transparent border-info text-white p-3"
                                    placeholder="{{ __('home.contact.subject') }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea name="message" class="form-control bg-transparent border-info text-white p-3" rows="8"
                                placeholder="{{ __('home.contact.message') }}" required style="resize: none;"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn">{{ __('home.contact.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-text text-center text-white mb-3">
            <p>&copy; {{ date('Y') }} Momen Rami | {{ __('home.footer.rights') }}</p>
        </div>
        <div class="footer-iconTop">
            <a href="#home"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>

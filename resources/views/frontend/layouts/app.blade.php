<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#020b14">
    <link href="{{ asset($setting?->icon) }}" rel="icon">
    <title>{{ $setting?->meta_title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $setting?->meta_description }}">
    <meta name="keywords" content="{{ $setting?->meta_keyword }}">
    <meta name="author" content="{{ $user?->full_name }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome/css/all.min.css') }}">
    <script src="https://kit.fontawesome.com/7b81d78297.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cyber-portfolio.css') }}">
</head>
<body>
<div class="cyber-site">
    @include('frontend.layouts.sidebar')

    <main class="dashboard" id="main-content">
        <header class="panel dashboard-topbar">
            <span class="terminal-user"><i class="fas fa-terminal"></i> sheraz@portfolio:~$</span>
            <span class="topbar-message">{{ config('cyber_portfolio.profile.tagline') }}</span>
            <div class="terminal-meta">
                <span><i class="fas fa-map-marker-alt"></i> {{ config('cyber_portfolio.profile.location') }}</span>
                <span><i class="far fa-calendar-alt"></i> <b id="local-time">Local time</b></span>
                <span class="online-dot"></span>
            </div>
            <a href="{{ asset($user?->resume ?? 'frontend/sheraz-howlader.pdf') }}" target="_blank" rel="noopener">Download CV <i class="fas fa-download"></i></a>
        </header>

        <div class="dashboard-split">
            <div class="dashboard-part dashboard-part-left">
                <section id="home" class="panel hero-panel">
            <div class="hero-grid">
                <div class="hero-copy">
                    <span class="eyebrow">{{ config('cyber_portfolio.hero.eyebrow') }}</span>
                    <h1>Building systems<br>behind the <span>interface.</span><i class="cursor"></i></h1>
                    <p>{{ config('cyber_portfolio.hero.description') }}</p>
                    <div class="hero-actions">
                        <a class="btn-primary-cyber" href="#portfolio">View my work <i class="fas fa-arrow-right"></i></a>
                        <a class="btn-ghost-cyber" href="{{ asset($user?->resume ?? 'frontend/sheraz-howlader.pdf') }}" target="_blank" rel="noopener">Download CV <i class="fas fa-download"></i></a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="profile-halo"></div>
                    <img src="{{ asset('frontend/images/profile-cutout.png') }}" alt="Portrait of {{ $user?->full_name }}">
                    <div class="experience-badge"><strong>0+</strong><span>{{ config('cyber_portfolio.profile.availability') }}</span><i></i></div>
                    <div class="hero-identity"><strong>{{ config('cyber_portfolio.profile.name') }}</strong><span>Full Stack Developer<br>&amp; Infrastructure Engineer</span></div>
                </div>
            </div>

            <div class="metric-strip">
                @foreach(config('cyber_portfolio.metrics') as $metric)
                    <div><i class="{{ $metric['icon'] }}"></i><strong>{{ $metric['value'] }}</strong><span>{{ $metric['label'] }}</span></div>
                @endforeach
            </div>
                </section>

                @include('frontend.layouts.education')
                @include('frontend.layouts.portfolio')
                @include('frontend.layouts.experience')
            </div>

            <div class="dashboard-part dashboard-part-right">
                @include('frontend.layouts.case-studies')
                @include('frontend.layouts.service')
                @include('frontend.layouts.about')
                @include('frontend.layouts.contact')
            </div>
        </div>

    </main>
</div>

@include('frontend.layouts.privacy-policy')
@include('frontend.layouts.disclaimer')

<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navToggle = document.querySelector('.nav-toggle');
        const sidebar = document.querySelector('.cyber-sidebar');
        const navLinks = document.querySelectorAll('.cyber-nav a');
        const timeTarget = document.getElementById('local-time');

        navToggle?.addEventListener('click', function () {
            const isOpen = sidebar.classList.toggle('is-open');
            navToggle.setAttribute('aria-expanded', String(isOpen));
        });

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                sidebar.classList.remove('is-open');
                navToggle?.setAttribute('aria-expanded', 'false');
            });
        });

        function updateClock() {
            if (!timeTarget) return;
            timeTarget.textContent = new Intl.DateTimeFormat('en-US', {
                weekday: 'short', month: 'short', day: '2-digit',
                hour: '2-digit', minute: '2-digit', hour12: true,
                timeZone: 'Asia/Dhaka'
            }).format(new Date());
        }

        updateClock();
        window.setInterval(updateClock, 30000);

        const sections = document.querySelectorAll('section[id]');
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                navLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
                });
            });
        }, { rootMargin: '-25% 0px -65% 0px' });
        sections.forEach(function (section) { observer.observe(section); });

        $('.popup-ajax').magnificPopup({ type: 'ajax', closeBtnInside: true });
    });
</script>
@stack('script')
@routes
</body>
</html>

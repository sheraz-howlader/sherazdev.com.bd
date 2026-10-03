<button class="nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
    <i class="fas fa-bars"></i>
</button>

<aside class="cyber-sidebar">
    <a class="brand" href="#home" aria-label="Back to home">
        <span>SHERAZ<b>.H</b></span>
        <small>Full Stack <i></i> Cloud <i></i> DevOps</small>
    </a>

    <nav class="cyber-nav" aria-label="Primary navigation">
        <a class="active" href="#home"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="#about"><i class="far fa-user"></i><span>About</span></a>
        <a href="#skills"><i class="fas fa-network-wired"></i><span>Skills</span></a>
        <a href="#portfolio"><i class="fas fa-th-large"></i><span>Projects</span></a>
        <a href="#case-studies"><i class="far fa-window-restore"></i><span>Case Studies</span></a>
        <a href="#services"><i class="fas fa-microchip"></i><span>Services</span></a>
        <a href="#journey"><i class="fas fa-briefcase"></i><span>Experience</span></a>
        <a href="#contact"><i class="far fa-newspaper"></i><span>Blog</span></a>
        <a href="#contact"><i class="far fa-envelope"></i><span>Contact</span></a>
    </nav>

    <a class="sidebar-cta" href="#contact">Let's Work Together <i class="fas fa-arrow-up"></i></a>

    <div class="sidebar-bottom">
        <p><i></i> Available for<br>New Opportunities</p>
        <div class="sidebar-socials">
            <a href="https://github.com/sheraz-howlader" target="_blank" rel="noopener" aria-label="GitHub"><i class="fab fa-github"></i></a>
            <a href="https://www.linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://twitter.com/sheraz_howlader" target="_blank" rel="noopener" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="mailto:{{ config('cyber_portfolio.profile.email') }}" aria-label="Email"><i class="far fa-envelope"></i></a>
        </div>
        <small>© {{ date('Y') }} {{ config('cyber_portfolio.profile.name') }}<br>All rights reserved.</small>
        <span class="terminal-prompt">&gt;_</span>
    </div>
</aside>

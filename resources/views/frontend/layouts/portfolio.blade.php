<section id="portfolio" class="panel content-panel">
    <div class="panel-heading">
        <h2><i class="fas fa-drafting-compass"></i> Featured projects</h2>
        <span>View all projects <i class="fas fa-arrow-right"></i></span>
    </div>
    <div class="project-grid">
        @foreach(config('cyber_portfolio.projects') as $project)
            <article class="project-card">
                <a class="project-image" href="#contact" aria-label="Discuss {{ $project['title'] }}">
                    <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" loading="lazy">
                </a>
                <div class="project-body">
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ $project['description'] }}</p>
                    <div class="project-tags">
                        @foreach($project['tags'] as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                    <a class="project-link" href="#contact">View project <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        @endforeach
    </div>
</section>

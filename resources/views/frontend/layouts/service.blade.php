<section id="services" class="panel content-panel">
    <div class="panel-heading">
        <h2><i class="fas fa-terminal"></i> What I do</h2>
        <span>End-to-end solutions</span>
    </div>
    <div class="service-grid">
        @foreach(config('cyber_portfolio.services') as $service)
            <article class="service-card">
                <div class="service-icon"><i class="{{ $service['icon'] }}"></i></div>
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>

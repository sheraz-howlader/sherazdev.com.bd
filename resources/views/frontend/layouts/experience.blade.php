<section id="journey" class="panel content-panel journey-panel">
    <div class="panel-heading">
        <h2><i class="fas fa-route"></i> My journey</h2>
    </div>
    <div class="journey-track">
        @foreach(config('cyber_portfolio.journey') as $journey)
            <article>
                <i></i>
                <strong>{{ $journey['year'] }}</strong>
                <span>{{ $journey['title'] }}</span>
            </article>
        @endforeach
    </div>
</section>

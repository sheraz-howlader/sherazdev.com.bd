<section id="case-studies" class="panel content-panel case-panel">
    <div class="panel-heading">
        <h2><i class="fas fa-user-shield"></i> Case studies</h2>
        <span>View all <i class="fas fa-arrow-right"></i></span>
    </div>
    <div class="case-list">
        @foreach(config('cyber_portfolio.case_studies') as $caseStudy)
            <article class="case-card">
                <strong>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</strong>
                <img src="{{ asset($caseStudy['image']) }}" alt="{{ $caseStudy['title'] }}" loading="lazy">
                <div>
                    <h3>{{ $caseStudy['title'] }}</h3>
                    <p>{{ $caseStudy['description'] }}</p>
                    <span>
                        @foreach($caseStudy['tags'] as $tag)
                            {{ $tag }}{{ $loop->last ? '' : ' · ' }}
                        @endforeach
                    </span>
                </div>
                <a href="#contact" aria-label="Discuss {{ $caseStudy['title'] }}"><i class="fas fa-external-link-alt"></i></a>
            </article>
        @endforeach
    </div>
</section>

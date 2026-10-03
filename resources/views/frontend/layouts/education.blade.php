<section id="skills" class="panel content-panel">
    <div class="panel-heading">
        <h2><i class="fas fa-terminal"></i> Tech stack</h2>
        <span>Tools I ship with</span>
    </div>
    <div class="skill-tabs" aria-label="Skill categories">
        <span class="active">All</span><span>Development</span><span>Infrastructure</span><span>DevOps</span><span>Tools</span>
    </div>
    <div class="skill-cloud">
        @foreach(config('cyber_portfolio.skills') as $skill)
            <span><i class="{{ $skill['icon'] }}"></i> {{ $skill['name'] }}</span>
        @endforeach
    </div>
</section>

{{-- The endpoints of one section, each a link to its page. --}}
<div class="endpoint-list">
    @foreach ($section['operations'] as $listed)
        <a class="endpoint-row" href="{{ route('operation', [$section['slug'], $listed['slug']]) }}">
            <span class="http-method http-method-{{ strtolower($listed['method']) }}">{{ $listed['method'] }}</span>
            <code class="endpoint-path">{{ $listed['path'] }}</code>
            <span class="endpoint-summary">{{ $listed['summary'] }}</span>
        </a>
    @endforeach
</div>

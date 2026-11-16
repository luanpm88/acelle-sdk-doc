{{-- Fields of a request: name, type, required, default, description (HTML from the reference). --}}
@foreach ($rows as $row)
    <div class="attribute-row">
        <div class="my-1">
            <span class="attribute-title">{{ $row['name'] }}</span>
            <span class="attribute-type">{{ $row['type'] }}</span>
            @if ($row['required'])
                <span class="attribute-required">required</span>
            @endif
            @if ($row['in'] !== 'body')
                <span class="attribute-in">{{ $row['in'] }}</span>
            @endif
        </div>
        @if ($row['description'] !== null)
            <div class="attribute-desc">{!! $row['description'] !!}</div>
        @endif
        @if ($row['default'] !== null)
            <div class="attribute-desc">Default: <code class="inline-code">{{ $row['default'] }}</code></div>
        @endif
    </div>
@endforeach

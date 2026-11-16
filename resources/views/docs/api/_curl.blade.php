{{-- One request sample: the generated curl, and the SDK call when the reference has one. --}}
<div class="code-box dark-theme {{ $php === null ? 'single-lang' : '' }}">
    <div class="box-header">
        <div class="box-title">{{ $title }}</div>
        @if ($php !== null)
        <div title="Click to Change" style="height: 26px;
        display: flex;
        align-items: center;" class="xtooltip box-tab ml-auto">
            <select class="lang-switch curl">
                <option value="curl" selected>cURL</option>
                <option value="php">PHP</option>
            </select>
            <select class="lang-switch php">
                <option value="curl">cURL</option>
                <option value="php" selected>PHP</option>
            </select>
        </div>
        @endif
        <div title="Copy to Clipboard" class="xtooltip box-copy">
            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
        </div>
    </div>
    <div class="lang-switch curl">
        <div class="code-blocks d-flex align-items-top">
            <div class="line-numbers">
                @for ($i = 1; $i <= substr_count($curl, "\n") + 1; $i++)
                    <span>{{ $i }}</span>
                @endfor
            </div>
            <pre class="IntroSection-pre"><code class="language-bash">{{ $curl }}</code></pre>
        </div>
    </div>
@if ($php !== null)
    <div class="lang-switch php">
        <div class="code-blocks d-flex align-items-top">
            <div class="line-numbers">
                @for ($i = 1; $i <= substr_count(rtrim($php), "\n") + 1; $i++)
                    <span>{{ $i }}</span>
                @endfor
            </div>
            <pre class="IntroSection-pre"><code class="language-php">{{ rtrim($php) }}</code></pre>
        </div>
    </div>
@endif
</div>

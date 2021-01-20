<div class="code-box dark-theme">
    <div class="box-header">
        <div class="box-title">{{ $title }}</div>
        <div title="Click to Change" style="height: 26px;
        display: flex;
        align-items: center;" class="xtooltip box-tab ml-auto">
            <select class="lang-switch curl">
                <option value="curl" selected>JS</option>
                {{-- <option value="php">HTML</option> --}}
            </select>
            <select class="lang-switch php">
                <option value="curl">JS</option>
                {{-- <option value="php" selected>HTML</option> --}}
            </select>
        </div>
        <div title="Copy to Clipboard" class="xtooltip box-copy">
            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
        </div>
    </div>
    <div class="lang-switchx php">
        <div class="code-blocks d-flex align-items-top">
            <div class="line-numbers">
                @for ($i=1; $i <= $lines; $i++)
                    <span>{{ $i }}</span>
                @endfor
            </div>
            <pre class="IntroSection-pre highlight html tab-html"><code class="language-js" style="width:{{ isset($width) ? $width . 'px' : 'auto' }}">{!! $html !!}</code></pre>
        </div>
    </div>
</div>
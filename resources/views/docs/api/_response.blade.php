{{-- The example answers of one endpoint, one at a time: the select picks the status. --}}
<div class="code-box response">
    <div class="box-header">
        <div class="box-title">Response</div>
        @if (count($examples) > 1)
            <div title="Click to Change" style="height: 26px; display: flex; align-items: center;" class="xtooltip box-tab ml-auto">
                <select class="response-switch">
                    @foreach ($examples as $example)
                        <option value="{{ $example['status'] }}">{{ $example['status'] }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    @foreach ($examples as $i => $example)
        {{-- The wrapper is what is hidden: .d-flex carries display: flex !important. --}}
        <div class="response-example" data-status="{{ $example['status'] }}" @if ($i > 0) style="display: none" @endif>
            <div class="code-blocks d-flex align-items-top">
                <pre class="IntroSection-pre"><code class="language-json">{{ $example['example'] }}</code></pre>
            </div>
        </div>
    @endforeach
</div>

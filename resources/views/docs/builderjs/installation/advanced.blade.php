<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
        <p>See the right panel for a more complicated setup. See the <strong>Configuration</strong> section for advanced installation options which provide you more control over how the builder functions.</p>
<p>By default, BuilderJS renders its HTML content to the <code>document.body</code> element of the page. i.e. the builder view will occupy the whole page. You can also configure it to render to a child element of your page.</p>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                <div class="code-box dark-theme">
                    <div class="box-header">
                        <div class="box-title">HTML</div>
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
                    <div class="lang-switch php">
                        <div class="code-blocks d-flex align-items-top">
                            <div class="line-numbers">
                                @for ($i=1; $i <= 16; $i++)
                                    <span>{{ $i }}</span>
                                @endfor
                            </div>
                            <pre class="IntroSection-pre highlight html tab-html"><code><span class="nt">&lt;script&gt;</span>
    <span class="c1">// A more complicated setup</span>
    <span class="kd">var</span> <span class="nx">builder</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">Editor</span><span class="p">({</span>
        <span class="na">root</span><span class="p">:</span> <span class="s1">'/project/dist/'</span><span class="p">,</span>
        <span class="na">url</span><span class="p">:</span> <span class="s1">'http://example.com/template/02093403'</span><span class="p">,</span>
        <span class="na">saveUrl</span><span class="p">:</span> <span class="s1">'http://example.com/save?id=02093403'</span><span class="p">,</span>
        <span class="na">saveMethod</span><span class="p">:</span> <span class="s1">'POST'</span><span class="p">,</span>
        <span class="na">backUrl</span><span class="p">:</span> <span class="s1">'http://example.com'</span><span class="p">,</span>
        <span class="na">tags</span><span class="p">:</span> <span class="p">[</span>
            <span class="p">{</span><span class="na">name</span><span class="p">:</span> <span class="s1">'First Name'</span><span class="p">,</span> <span class="na">type</span><span class="p">:</span> <span class="s1">'display'</span><span class="p">},</span>
            <span class="p">{</span><span class="na">name</span><span class="p">:</span> <span class="s1">'Last Name'</span><span class="p">,</span> <span class="na">type</span><span class="p">:</span> <span class="s1">'display'</span><span class="p">},</span>
            <span class="p">{</span><span class="na">name</span><span class="p">:</span> <span class="s1">'Current Year'</span><span class="p">,</span> <span class="na">type</span><span class="p">:</span> <span class="s1">'display'</span><span class="p">},</span>
            <span class="p">{</span><span class="na">name</span><span class="p">:</span> <span class="s1">'Current Date'</span><span class="p">,</span> <span class="na">type</span><span class="p">:</span> <span class="s1">'display'</span><span class="p">}</span>
        <span class="p">]</span>
    <span class="p">});</span>
<span class="nt">&lt;/script&gt;</span>
                            </code></pre>
                        </div>
                    </div>
                </div>
                <div class="code-box response">
                    <div class="box-header">
                        <div class="box-title">NOTICE</div>
                    </div>
                    <div class="code-blocks p-3">
                    <p>The <code>"root"</code> parameter which is important for BuilderJS to find the related resources. For example, if your builderjs distributable (<code>dist</code>) is available at <code>http://example.com/project/dist/</code>, then you need to set your <code>"root"</code> value to <code>"/project/dist/"</code>. Remember to keep both leading and trailing slashes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
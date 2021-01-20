<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>BuilderJS comes with <code>init()</code> helper function allowing you to quickly initiate the builder and append it to your current web page.</p>

            <p>Simply include the BuilderJS JavaScript and CSS files to your HTML page and initiate it on page load. See sample code in the right panel, <code>javascript</code> tab, to see how easy it is to load a fully-functioning builder to your webpage. With minimum configuration like that, the builder loads with a default blank design page like below</p>

            <p><img width="100%" src="https://builderjs.s3.amazonaws.com/BuilderJS-00303.png" title="Default Blank Page" alt="Default Blank Page" /></p>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                <p>Put the following HTML JavaScript code snippet to your HTML page:</p>
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
                                @for ($i=1; $i <= 12; $i++)
                                    <span>{{ $i }}</span>
                                @endfor
                            </div>
                            <pre class="IntroSection-pre highlight html tab-html"><code style="width:780px">&#x3C;html&#x3E;
    &#x3C;head&#x3E;
        &#x3C;link rel=&#x22;stylesheet&#x22; href=&#x22;/project/dist/builder.min.css&#x22;&#x3E;&#x3C;/link&#x3E;
        &#x3C;script type=&#x27;text/javascript&#x27; src=&#x22;/project/dist/builder.min.js&#x22;&#x3E;&#x3C;/script&#x3E;
    &#x3C;/head&#x3E;
    &#x3C;body&#x3E;
        &#x3C;script language=&#x22;Javascript&#x22;&#x3E;
            var builder = new Editor({ root: &#x22;/project/dist/&#x22; });
            builder.init();
        &#x3C;/script&#x3E;
    &#x3C;/body&#x3E;
&#x3C;/html&#x3E;
</code></pre>
                        </div>
                    </div>
                </div>
                <p>It's that simple! The builder's <code class="display-inline">init()</code>
                    function will do the magic of
                    rendering the entire builder
                    view with its default settings and append it to your page's <code class="display-inline">body</code>.
                </p>
            </div>
        </div>
    </div>
</div>
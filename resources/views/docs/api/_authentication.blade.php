<div id="authentication" class="subsection">
    <h4 class="mb-4">Authentication</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Generate one time login token. User can login by visiting the following URL:
                <br/>
                <code class="inline-code">http://acelle.wsl/login/token/*|token_string|*</code>
            </p>

            <div class="mt-4">
                <h6>Attributes</h6>

                <div class="mt-3">
                    <div class="attribute-row">
                        <div class="my-1">
                            <span class="attribute-title">api_token</span>
                            <span class="attribute-type">string</span>
                        </div>
                        <div class="attribute-desc">
                            Your API token. You can find it in your API main page when logged in.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="code-box dark-theme">
                <div class="box-header">
                    <div class="box-title">REQUEST LOGIN TOKEN</div>
                    <div class="box-tab ml-auto">
                        <select>
                            <option>cURL</option>
                            <option>PHP</option>
                        </select>
                    </div>
                    <div class="box-copy">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
                    </div>
                </div>
                <div class="code-blocks d-flex align-items-top">
                    <div class="line-numbers">
                        @for ($i=1; $i <= 3; $i++)
                            <span>{{ $i }}</span>
                        @endfor
                    </div>
                    <pre class="IntroSection-pre"><code class="language-bash"><span class="hljs-keyword">curl</span> -X <span class="hljs-meta">POST</span> -H "accept:application/json" -G \
    <span class="hljs-link">http://acelle.wsl/api/v1/login-token</span> \
    -d <span class="hljs-keyword">api_token</span>=<span class="hljs-meta">[API_TOKEN]</span></code></pre>
                </div>
            </div>

            <div class="code-box response">
                <div class="box-header">
                    <div class="box-title">RESPONSE</div>
                </div>
                <pre class="IntroSection-pre"><code class="language-json">{
    "token": "22ZZqhjWdkoyyG66rS9wO0AJ8S3w5NxP"
}</code></pre>
            </div>
        </div>
    </div>
</div>
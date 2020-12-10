<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Authentication</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Generate one time login token. User can login by visiting the following URL:
                <br/>
                <code class="inline-code">http://acelle.wsl/login/token/*|token_string|*</code>
            </p>

            <div class="mt-4">
                <h5>Parameters</h5>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'api_token',
                                'type' => 'string',
                                'desc' => 'Your API token. You can find it in your API main page when logged in.',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky">
                @include('docs.api._curl', [
                    'title' => 'CREATE NEW LIST',
                    'curl' => [
                        'uri' => 'login-token',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => 'loginToken()',
                        'lines' => 5,
                    ],
                ])
                
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
</div>
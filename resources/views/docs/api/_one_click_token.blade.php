<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">One-click Login</h2>
    <div class="row">
        <div class="col-md-6 pr-5">
            <p>
            Sometimes it is useful to have a one-click login URL so that users can login to their Acelle Mail's dashboard without having to enter their username or password. User can just click on a one-time login link to get logged in to the web UI. It is especially helpful when you use Acelle with another application and you do not want to have your users enter their username or password twice. And you do not want to employ a complicated authentication mechanism like SSO (Single Sign-on). Then using a one-click login URL comes in handy.</p>

            <p>It is as simple as making a POST request to <code class="inline-code">/login-token</code> resource to obtain a one-time login token as well as the one-time login URL</p>

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
                    'title' => 'Authentication',
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
    "token": "8vunPVPUDBMGYOEk9",
    "url": "http://example.com/login/token/8vunPVPUDBMGYOEk9"
}</code></pre>
                </div>
            </div>            
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Authentication</h2>
    <div class="row">
        <div class="col-md-7 pr-5">
            <p>
            Acelle Mail API employs simple Token Authentication which is also referred Bearer Authentication.
            That is, every Acelle user account has an authentication. The token must be sent in either the <code>Authorization</code> HTTP header or in the query string URL when making requests to protected resources:</p>

            <p><code class="inline-code">Authorization: Bearer &lt;token&gt;</code></p>

            <p>Or as a query string parameter in the request URL</p>

            <p><code class="inline-code">https://acelle.com/api/v1?api_token=YOUR_API_TOKEN</code></p>

            Important: using an authentication token in the Bearer header is highly recommended over in a query string, and it should only be used over HTTPS (SSL).
            </p>
        </div>
        <div class="col-md-5">
            <h6>FIND YOUR API TOKEN</h6>
            <p class="">You will need to first login to your Acelle account to find the API TOKEN which is available in the <code class="inline-code"> My Profile > API & Authentication</code> dashboard</p>
        </div>
    </div>
</div>

<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">One Click Login</h2>
    <div class="row">
        <div class="col-md-6 pr-5">
            <p>
            Sometimes it is useful to have a one-click login URL so that users can login to their Acelle Mail's dashboard without having to enter their username or password. User can just click on a one-time login link to get logged in to the web UI. It is especially helpful if users when you integrate Acelle with another application or system and you do not want to employ a complicated mechanism like SSO (Single Sign-Oon)</p>

            <p>Make a POST request to <code class="inline-code">/login-token</code> resource to obtain a one-time login token as well as the one-time login URL</p>

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
    "token": "22ZZqhjWdkoyyG66rS9wO0AJ8S3w5NxP",
    "url": "http://example.com/login/token/8vunPVPUDBMGYOEk9"
}</code></pre>
                </div>
            </div>            
        </div>
    </div>
</div>
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
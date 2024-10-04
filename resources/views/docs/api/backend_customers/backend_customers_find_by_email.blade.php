<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Get Customer's Details</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get detailed information of a customer identified by a <code>email</code></p>

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
                            [
                                'name' => 'email',
                                'type' => 'string',
                                'desc' => 'Customer\'s email address',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'FIND CUSTOMER',
                    'curl' => [
                        'uri' => 'customers/by-email/<span class="hljs-keyword">{email}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "customer()->findByEmail('test@abc.com')",
                        'lines' => 5,
                    ],
                ])

@include('docs.api._response', [
    'json' => '{
    "customer": {
        "uid": "5fd093b62ea11",
        "first_name": "Test",
        "last_name": "Customer",
        "image": null,
        "timezone": "America\/Godthab",
        "status": "active",
        "options": [],
        "current_period_ends_at": null
    }
}',
    ])
            </div>   
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Get Customer's Details</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get detailed information of a customer identified by a <code>UID</code> code</p>

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
                                'name' => 'uid',
                                'type' => 'string',
                                'desc' => 'Customer\'s uid',
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
                        'uri' => 'customers/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "customer()->find('5fd1a0097ce01')",
                        'lines' => 5,
                    ],
                ])

@include('docs.api._response', [
    'json' => '{
    "customer": {
        "uid": "5fd093b62ea11",
        "first_name": "Luan",
        "last_name": "Pham",
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
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Disable Customer</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Delete a Customer.</p>

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
                    'title' => 'DISABLE CUSTOMER',
                    'curl' => [
                        'uri' => 'customers/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'DELETE',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "customer()->delete('5fd1a0097ce01')",
                        'lines' => 5,
                    ],
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "Customer was deleted",
    "customer_uid": "5fd093b62ea11"
}',
    ])
            </div>   
        </div>
    </div>
</div>
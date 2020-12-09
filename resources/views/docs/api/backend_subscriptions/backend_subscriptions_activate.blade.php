<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Activate Subscription</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Admin activate pending subscription</p>

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
                                'desc' => 'Subscription\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'ACTIVATE SUBSCRIPTION',
                    'curl' => [
                        'uri' => 'subscriptions/<span class="hljs-keyword">{uid}</span>/activate',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "The subscription was activated successfully.",
}',
    ])
            </div>   
        </div>
    </div>
</div>
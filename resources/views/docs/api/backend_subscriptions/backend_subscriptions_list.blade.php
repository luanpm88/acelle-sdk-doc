<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Create a subscription</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>List all subscriptions from application.</p>

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
                                'name' => 'per_page',
                                'type' => 'string',
                                'desc' => 'Number of subscriptions each page. Default is 25',
                            ],
                            [
                                'name' => 'page',
                                'type' => 'string',
                                'desc' => 'Page number. Default is 1',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'SUBSCRIPTIONS',
                    'curl' => [
                        'uri' => 'subscriptions',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'per_page', 'value' => '20'],
                            ['name' => 'plan_uid', 'value' => '1'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscription()->all([
    'per_page' => '25',
    'page' => '1',
])",
                        'lines' => 8,
                    ],                    
                ])

@include('docs.api._response', [
    'json' => '[
    {
        "id": 1,
        "uid": "5fade5c93e42a",
        "customer_id": "23",
        "plan_id": "8",
        "status": "ended",
        "current_period_ends_at": null,
        "ends_at": "2021-11-13 01:47:53"
    },
    {
        "id": 2,
        "uid": "5fc9e55410e10",
        ...
    },
    ...
]',
    ])
            </div>   
        </div>
    </div>
</div>
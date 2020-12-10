<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">All Subscribers</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>View all subscribers</p>

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
                                'name' => 'list_uid',
                                'type' => 'string',
                                'desc' => 'List\'s uid',
                            ],
                            [
                                'name' => 'api_token',
                                'type' => 'string',
                                'desc' => 'Your API token. You can find it in your API main page when logged in.',
                            ],
                            [
                                'name' => 'open',
                                'type' => 'string',
                                'desc' => 'default: all;
yes - opened some campaigns;
no - not opened any campaign',
                            ],
                            [
                                'name' => 'click',
                                'type' => 'string',
                                'desc' => 'default: all;
yes - clicked some campaigns;
no - not clicked any campaign',
                            ],
                            [
                                'name' => 'per_page',
                                'type' => 'string',
                                'desc' => 'Number of subscribers per page. Default: 25',
                            ],
                            [
                                'name' => 'page',
                                'type' => 'string',
                                'desc' => 'Page number',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'VIEW SUBSCRIBERS',
                    'curl' => [
                        'uri' => 'subscribers',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'list_uid', 'value' => '*|list_uid|*'],
                            ['name' => 'per_page', 'value' => '20'],
                            ['name' => 'page', 'value' => '1'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscriber()->all([
    'list_uid' => '5fade5c93e42a',
    'per_page' => '20',
    'page' => '1',
])",
                        'lines' => 9,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "uid": "5fd07b8b65284",
        "email": "nickyu88@gmail.com",
        "status": "subscribed",
        "FIRST_NAME": "Nick",
        "LAST_NAME": "KKu",
        "CUSTOM_FIELD_1": "test"
    },
    ...
]',
                ])
            </div>
        </div>
    </div>
</div>
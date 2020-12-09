<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Find a Subscriber</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Find a Subscriber</p>

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
                                'desc' => 'Mail list\'s uid',
                            ],
                            [
                                'name' => 'uid',
                                'type' => 'string',
                                'desc' => 'Subsciber\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'FIND SUBSCRIBER',
                    'curl' => [
                        'uri' => 'lists/<span class="hljs-keyword">{list_uid}</span>/subscribers/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

                @include('docs.api._response', ['json' => '{
    "subscriber": {
        "uid":"5fd07b8b65284",
        "email":"anna122@gmail.com",
        "status":"subscribed",
        "source":null,
        "ip_address":null,
        "FIRST_NAME":"Ann",
        "LAST_NAME":"Anna",
        "CUSTOM_FIELD_1":"test"
    }
}',
                ])
            </div>
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Get Subscriber's Details</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get detailed information of a subscriber identified by an <code>ID</code> code. Notice that a subscriber's ID is globally unique. A contact identified by his/her email address may have more than one ID if he or she is added to more than one list.</p>

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
                                'name' => 'id',
                                'type' => 'string',
                                'desc' => 'Subsciber\'s id',
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
                        'uri' => 'subscribers/<span class="hljs-keyword">{id}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscriber()->find('e31046fce3d83')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', ['json' => '{
    "subscriber": {
        "id":"5fd07b8b65284",
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
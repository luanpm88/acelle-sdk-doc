<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Update Subscriber Information</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Update Subscriber Information</p>

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
                                'desc' => 'Subsciber\'s uid',
                            ],
                            [
                                'name' => 'EMAIL',
                                'type' => 'string',
                                'desc' => 'Subscriber\'s email',
                            ],
                            [
                                'name' => 'tag',
                                'type' => 'string',
                                'desc' => 'Subscriber\'s tags, seperated by a comma (,).',
                            ],
                            [
                                'name' => '[OTHER_FIELDS...]',
                                'type' => 'string',
                                'desc' => 'All subscriber\'s other fields: FIRST_NAME (?), LAST_NAME (?),... (depending on the list fields configuration)',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'UPDATE SUBSCRIBER',
                    'curl' => [
                        'uri' => 'subscribers/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'PATCH',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'EMAIL', 'value' => 'test@gmail.com'],
                            ['name' => 'tag', 'value' => 'foo,bar,tag+with+space'],
                            ['name' => 'FIRST_NAME', 'value' => 'Marine'],
                            ['name' => 'LAST_NAME', 'value' => 'Joze'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscriber()->update('e31046fce3d83', [
    'EMAIL' => 'test2@gmail.com',
    'tag' => 'foo,bar,tag+with+space,',
    'FIRST_NAME' => 'Marine',
    'LAST_NAME' => 'Joze',
])",
                        'lines' => 10,
                    ],
                    
                ])

                @include('docs.api._response', [
                    'json' => '{
    "status": 1,
    "message": "Subscriber was successfully updated",
    "subscriber_uid": "5fd07b8b65284"
}',
                ])
            </div>
        </div>
    </div>
</div>
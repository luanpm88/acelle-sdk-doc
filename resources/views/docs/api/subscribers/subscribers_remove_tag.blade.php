<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Remove Tag</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Remove one or more tags to a given subscriber. Tagging allows you to add custom labels to your subscribers, giving you the ability to reach people based on specific traits.</p>

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
                                'desc' => 'Subscriber\'s uid',
                            ],
                            [
                                'name' => 'tag',
                                'type' => 'string',
                                'desc' => 'Subscriber\'s tags, seperated by a comma (,).',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'REMOVE SUBSCRIBER TAG',
                    'curl' => [
                        'uri' => 'subscribers',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'tag', 'value' => 'foo,bar,tag+with+space,'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscriber()->removeTag('5fade5c93e42a', [
    'tag' => 'foo,bar,tag+with+space,',
])",
                        'lines' => 7,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "status": 1,
    "message": "Tag was removed successfully",
    "subscriber_uid": "5fd07ca421da0",
    "tags": ["foo","bar","tag with space"]
}',
                ])
            </div>
        </div>
    </div>
</div>
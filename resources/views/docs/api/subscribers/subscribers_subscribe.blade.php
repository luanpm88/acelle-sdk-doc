<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Subscribe</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Add a subscriber to a list identified by a <code>UID</code>. Once added, the subscriber's status would be either <code>pending</code>. This also triggers a confirmation email sending to the subscriber's email address for verification.</p>

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
                    'title' => 'SUBSCRIBE',
                    'curl' => [
                        'uri' => 'lists/<span class="hljs-keyword">{list_uid}</span>/subscribers/<span class="hljs-keyword">{uid}</span>/subscribe',
                        'method' => 'PATCH',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "list()->subscribe(\$uid = 'e31046fce3d83', \$subscriber_id = '44068')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "status": 1,
    "message": "Subscriber was subscribed"
}',
                ])
            </div>
        </div>
    </div>
</div>
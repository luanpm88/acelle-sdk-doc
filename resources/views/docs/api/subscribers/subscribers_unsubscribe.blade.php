<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Unsubscribe</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Unsubscribe</p>

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
                    'title' => 'UNSUBSCRIBE',
                    'curl' => [
                        'uri' => 'subscribers/<span class="hljs-keyword">{uid}</span>/unsubscribe',
                        'method' => 'PATCH',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscriber()->unsubscribe('e31046fce3d83')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "status": 1,
    "message": "Subscriber was unsubscribed"
}',
                ])
            </div>
        </div>
    </div>
</div>
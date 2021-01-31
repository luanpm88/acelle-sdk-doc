<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Unsubscribe</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Unsubscribe a contact from a given list. Notice that the contact is still available in the list but of <code>unsubscribed</code> status and Acelle will no longer send marketing emails to this contact. You can completely delete the contact from the list using the <code>DELETE</code> API method.</p>

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
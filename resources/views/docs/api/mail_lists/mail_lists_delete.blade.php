<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Delete List</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Delete a list and completely erase the list's information in the web platform.</p>

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
                                'desc' => 'List\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'DELETE LIST',
                    'curl' => [
                        'uri' => 'lists/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'DELETE',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "list()->delete('e31046fce3d83')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "status": 1,
    "message": "Deleted"
}',
                ])
            </div>
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Sending Servers</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get information about all sending servers</p>

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
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'VIEW SENDING SERVERS',
                    'curl' => [
                        'uri' => 'sending_servers',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "uid":"5fc273b9ded36",
        "name":"Amazon API",
        "created_at":"2020-11-28 15:58:49",
        "updated_at":"2020-11-28 15:58:53"
    }
]',
                ])
            </div>
        </div>
    </div>
</div>
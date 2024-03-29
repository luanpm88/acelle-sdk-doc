<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Run a campaign.</p>

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
                                'desc' => 'Campaign\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'RUN CAMPAIGN',
                    'curl' => [
                        'uri' => 'campaigns/<span class="hljs-keyword">{uid}</span>/run',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'uid', 'value' => '*|uid|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "campaign()->run('6006510d1d421')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', ['json' => '{
    "status": "success",
    "message": "The campaign was launched",
    "campaign": {
        "uid": "6006510d1d421",
        "name": "Copy of Untitled",
        "list": "",
        "segment": "",
        ...
    }
}',
                ])
            </div>
        </div>
    </div>
</div>
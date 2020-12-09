<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Files</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Upload file(s) to customer's storage</p>

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
                                'name' => 'files',
                                'type' => 'string',
                                'desc' => 'File url(s)',
                            ],
                            [
                                'name' => 'subdirectory',
                                'type' => 'string',
                                'desc' => 'Custom subdirectory. Default: user root directory',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'VIEW SENT NOTIFICATIONS',
                    'curl' => [
                        'uri' => 'notifications',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'files', 'value' => '\'[{"url":"http://demo.acellemail.com/images/logo_big.svg","subdirectory":"path/to/file"},{"url":"http://demo.acellemail.com/images/logo_big.svg"}]","subdirectory":"path/to/file2"}]\''],
                        ],
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "file": "http:\/\/demo.acellemail.com\/images\/logo_big.svg",
        "status": 1,
        "message": "File uploaded"
    },
    {
        "file": "http:\/\/demo.acellemail.com\/images\/logo_big.svg",
        "status": 1,
        "message": "File uploaded"
    }
]',
                ])
            </div>
        </div>
    </div>
</div>
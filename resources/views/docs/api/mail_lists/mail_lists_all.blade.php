<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">View Lists</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get information about all lists</p>

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
                    'title' => 'VIEW LISTS',
                    'curl' => [
                        'uri' => 'lists',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "id": 1,
        "uid": "5fade5c93e42a",
        "name": "Luan Pham",
        "default_subject": "luanpm88@gmail.com",
        "from_email": "luanpm@live.com",
        "from_name": "Luan Pham",
        "status": null,
        "created_at": "2020-11-13 01:47:53",
        "updated_at": "2020-12-04 07:29:24"
    },
    {
        "id": 2,
        "uid": "5fc9e55410e10",
        "name": "List 1",
        ...
    },
    ...
]',
                ])
            </div>
        </div>
    </div>
</div>
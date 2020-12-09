<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">View Campaigns</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get information about all campaigns</p>

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
                        'uri' => 'campaigns',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "uid":"5fb48ff221b27",
        "name":"Untitled",
        "type":"regular",
        "subject":"luanpm88@gmail.com",
        "html":"<!DOCTYPE html>\n<html lang=\"en\">\n...",
            "plain": "One column layout...",
            "from_email": "luanpm@live.com",
            "from_name":"Luan Pham",
            "reply_to":"luanpm@live.com",
            "status":"new",
            "delivery_at":null,
            "created_at":"2020-11-18 03:07:30",
            "updated_at":"2020-11-18 03:07:41"
    },
    ...
]',
                ])
            </div>
        </div>
    </div>
</div>
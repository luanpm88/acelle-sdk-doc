<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Get List Details</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Retrive information of a list identified by a given <code class="inline-code">UID</code> passed to the API call.</p>

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
                    'title' => 'FIND LIST',
                    'curl' => [
                        'uri' => 'lists/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "list()->find('*|uid|*')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "list": {
        "uid": "5fc9e55410e10",
        "name": "List 1",
        "default_subject": "Welcome to ABC Corp.",
        "from_email": "admin@abccorp.org",
        "from_name": "ABC Corp.",
        "remind_message": null,
        "status": null,
        "created_at": [],
        "updated_at": [],
        "fields": [
            {
                "key": "EMAIL",
                "label": "Email",
                "type": "string",
                "tag": "EMAIL",
                "default_value": null,
                "visible": "1",
                "required": true,
                "custom_order": null
            },
            ..
        ]
    },
    "contact": {
        "company": "ABC Corp.",
        "address_1": "14 Tottenham Court Road London England",
        "address_2": "44-46 Morningside Road Edinburgh Scotland EH10 4BF",
        "country": "Afghanistan",
        "state":"Armagh",
        "zip": "80000",
        "phone": "123 456 889",
        "url": "http:\/\/www.abccorp.org",
        "email": "info@abccorp.org",
        "city": "Noname"
    },
    "statistics": {
        "subscriber_count": 0,
        "open_uniq_rate": 0,
        "click_rate": 0,
        "subscribe_rate": 0,
        "unsubscribe_rate": 0,
        "unsubscribe_count": 0,
        "unconfirmed_count": 0
    }
}',
                ])
            </div>
        </div>
    </div>
</div>
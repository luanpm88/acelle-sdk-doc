<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Find Subscriber by Email</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Find Subscriber by Email</p>

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
                                'name' => 'type',
                                'type' => 'string',
                                'desc' => 'Choose one of these types: text, number, datetime.',
                            ],
                            [
                                'name' => 'label',
                                'type' => 'string',
                                'desc' => 'Field\' label',
                            ],
                            [
                                'name' => 'tag',
                                'type' => 'string',
                                'desc' => 'The tag name may have alpha-numeric characters, as well as dashes and underscores.',
                            ],
                            [
                                'name' => 'default_value',
                                'type' => 'string',
                                'desc' => 'Default value of the field',
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
                        'uri' => 'lists/<span class="hljs-keyword">{uid}</span>/add-field',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'type', 'value' => 'text'],
                            ['name' => 'label', 'value' => 'Custom'],
                            ['name' => 'tag', 'value' => 'CUSTOM_FIELD_1'],
                            ['name' => 'default_value', 'value' => 'test'],
                        ],
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
"status": 1,
"message": "List\'s field was created",
"field": {
    "mail_list_id": 2,
    "type": "text",
    "label": "Custom",
    "tag":"CUSTOM_FIELD_1",
    "default_value":"test",
    "uid":"5fcae3cb6298f",
    "updated_at":"2020-12-05 01:35:07",
    "created_at":"2020-12-05 01:35:07","id":7
}
}',
                ])
            </div>
        </div>
    </div>
</div>
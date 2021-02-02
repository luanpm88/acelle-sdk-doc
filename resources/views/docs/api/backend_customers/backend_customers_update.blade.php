<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Update Customer</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Update a customer's attributes, identified by a <code>UID</code> code</p>

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
                                'desc' => 'Customer\'s uid',
                            ],
                            [
                                'name' => 'email',
                                'type' => 'email',
                                'desc' => 'Customer\'s email',
                            ],
                            [
                                'name' => 'password',
                                'type' => 'string',
                                'desc' => 'Customer\'s password',
                            ],
                            [
                                'name' => 'first_name',
                                'type' => 'string',
                                'desc' => 'Customer\'s first name',
                            ],
                            [
                                'name' => 'last_name',
                                'type' => 'string',
                                'desc' => 'Customer\'s last name',
                            ],
                            [
                                'name' => 'timezone',
                                'type' => 'string',
                                'desc' => 'Customer\'s timezone',
                            ],
                            [
                                'name' => 'language_id',
                                'type' => 'string',
                                'desc' => 'Language id',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'UPDATE CUSTOMER',
                    'curl' => [
                        'uri' => 'customers/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'PATCH',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'email', 'value' => 'user_name@gmail.com'],
                            ['name' => 'first_name', 'value' => 'Luan'],
                            ['name' => 'last_name', 'value' => 'Pham'],
                            ['name' => 'timezone', 'value' => 'America/Godthab'],
                            ['name' => 'language_id', 'value' => '1'],
                            ['name' => 'password', 'value' => '123456'],
                        ],
                    ],
                    'php' => [
                        'function' => "customer()->update('5fd1a0097ce01', [
    'email' => 'user_namexx@gmail.com',
    'first_name' => 'Luan',
    'last_name' => 'Pham',
    'timezone' => 'America/Godthab',
    'language_id' => '1',
    'password' => '123456',
])",
                        'lines' => 12,
                    ],
                ])

@include('docs.api._response', [
    'json' => '{
    "customer": {
        "uid": "5fd093b62ea11",
        "first_name": "Luan",
        "last_name": "Pham",
        "image": null,
        "timezone": "America\/Godthab",
        "status": "active",
        "options": [],
        "current_period_ends_at": null
    }
}',
    ])
            </div>   
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Add new Plan</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Add new Plan</p>

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
                                'name' => 'name',
                                'type' => 'string',
                                'desc' => 'Plan\'s name',
                            ],
                            [
                                'name' => 'currency_id',
                                'type' => 'string',
                                'desc' => 'Currency\'s id',
                            ],
                            [
                                'name' => 'frequency_amount',
                                'type' => 'string',
                                'desc' => 'Billing recurs every this amount of time',
                            ],
                            [
                                'name' => 'frequency_unit',
                                'type' => 'string',
                                'desc' => 'Time unit for billing recurs (day, week, month, year, unlimited)',
                            ],
                            [
                                'name' => 'price',
                                'type' => 'string',
                                'desc' => 'Plan\'s price',
                            ],
                            [
                                'name' => 'color',
                                'type' => 'string',
                                'desc' => 'Plan\'s color (red, blue, #008c6e, #917319,...)',
                            ],
                            [
                                'name' => 'options[...]',
                                'type' => 'string',
                                'desc' => '<dd>Plan\'s options...',
                                'attributes' => [
                                    [
                                        'name' => 'email_max',
                                        'desc' => 'Email sending credits (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'list_max',
                                        'desc' => 'Max lists (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'subscriber_max',
                                        'desc' => 'Max subscribers (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'subscriber_per_list_max',
                                        'desc' => 'Max subscribers per list (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'segment_per_list_max',
                                        'desc' => 'Max segments per list (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'campaign_max',
                                        'desc' => 'Max campaigns (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'automation_max',
                                        'desc' => 'Max automations (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'sending_quota',
                                        'desc' => 'Sending credits (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'sending_quota_time',
                                        'desc' => 'Time value (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'sending_quota_time_unit',
                                        'desc' => 'Time unit (day|hour|minute)',
                                    ],
                                    [
                                        'name' => 'max_process',
                                        'desc' => 'Max number of processes (number)',
                                    ],
                                    [
                                        'name' => 'all_sending_servers',
                                        'desc' => 'Use all sending servers (yes|no)',
                                    ],
                                    [
                                        'name' => 'max_size_upload_total',
                                        'desc' => 'Maximum size of all files (MB) (number)',
                                    ],
                                    [
                                        'name' => 'max_file_size_upload',
                                        'desc' => 'Maximum upload size per file (MB) (number)',
                                    ],
                                    [
                                        'name' => 'unsubscribe_url_required',
                                        'desc' => '{UNSUBSCRIBE_URL} tag is required (yes|no)',
                                    ],
                                    [
                                        'name' => 'access_when_offline',
                                        'desc' => 'Access when site is offline (yes|no)',
                                    ],
                                    [
                                        'name' => 'create_sending_domains',
                                        'desc' => 'Allows customer to add sending domains (yes|no)',
                                    ],
                                    [
                                        'name' => 'sending_servers_max',
                                        'desc' => 'Max sending servers per customer (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'sending_domains_max',
                                        'desc' => 'Max sending domains per customer (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'all_email_verification_servers',
                                        'desc' => 'Use all email verification servers (yes|no)',
                                    ],
                                    [
                                        'name' => 'create_email_verification_servers',
                                        'desc' => 'Allows customer to add email verification servers (yes|no)',
                                    ],
                                    [
                                        'name' => 'email_verification_servers_max',
                                        'desc' => 'Max email verification servers per customer (number, -1 for unlimited)',
                                    ],
                                    [
                                        'name' => 'list_import',
                                        'desc' => 'Customer can import list (yes|no)',
                                    ],
                                    [
                                        'name' => 'list_export',
                                        'desc' => 'Customer can export list (yes|no)',
                                    ],
                                    [
                                        'name' => 'all_sending_server_types',
                                        'desc' => 'Allow customer to add any sending server type (yes|no)',
                                    ],
                                    [
                                        'name' => 'sending_server_types',
                                        'desc' => '(array)',
                                    ],
                                    [
                                        'name' => 'sending_server_option',
                                        'desc' => '(system|own|subaccount)',
                                    ],
                                    [
                                        'name' => 'sending_server_subaccount_uid',
                                        'desc' => 'Sending server\'s sub-account ID',
                                    ],
                                ],
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'CREATE NEW LIST',
                    'curl' => [
                        'uri' => 'login-token',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'name', 'value' => 'Advanced'],
                            ['name' => 'currency_id', 'value' => '1'],
                            ['name' => 'frequency_amount', 'value' => '1'],
                            ['name' => 'frequency_unit', 'value' => 'month'],
                            ['name' => 'price', 'value' => '20'],
                            ['name' => 'color', 'value' => 'red'],
                            ['name' => 'options[sending_server_option]', 'value' => 'own'],
                            ['name' => 'options[email_max]', 'value' => '10000'],
                        ],
                    ],
                    'php' => [
                        'function' => "plan()->create([
    'name' => 'Advanced',
    'currency_id' => '1',
    'frequency_amount' => '1',
    'frequency_unit' => 'month',
    'price' => '20',
    'color' => 'red',
    'options[sending_server_option]' => 'own',
    'options[email_max]' => '10000',
])",
                        'lines' => 14,
                    ],
                    
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "Plan was successfully created",
    "plan_uid": "5fd08d2ed4cc8"
}',
    ])
            </div>   
        </div>
    </div>
</div>
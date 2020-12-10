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
                                'desc' => '<dd>Plan\'s options...<br>
                            <ul>
                                <li><span class="text-semibold">email_max</span>: Email sending credits (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">list_max</span>: Max lists (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">subscriber_max</span>: Max subscribers (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">subscriber_per_list_max</span>: Max subscribers per list (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">segment_per_list_max</span>: Max segments per list (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">campaign_max</span>: Max campaigns (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">automation_max</span>: Max automations (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">sending_quota</span>: Sending credits (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">sending_quota_time</span>: Time value (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">sending_quota_time_unit</span>: Time unit (day|hour|minute)</li>
                                <li><span class="text-semibold">max_process</span>: Max number of processes (number)</li>
                                <li><span class="text-semibold">all_sending_servers</span>: Use all sending servers (yes|no)</li>
                                <li><span class="text-semibold">max_size_upload_total</span>: Maximum size of all files (MB) (number)</li>
                                <li><span class="text-semibold">max_file_size_upload</span>: Maximum upload size per file (MB) (number)</li>
                                <li><span class="text-semibold">unsubscribe_url_required</span>: {UNSUBSCRIBE_URL} tag is required (yes|no)</li>
                                <li><span class="text-semibold">access_when_offline</span>: Access when site is offline (yes|no)</li>
                                <li><span class="text-semibold">create_sending_domains</span>: Allows customer to add sending domains (yes|no)</li>
                                <li><span class="text-semibold">sending_servers_max</span>: Max sending servers per customer (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">sending_domains_max</span>: Max sending domains per customer (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">all_email_verification_servers</span>: Use all email verification servers (yes|no)</li>
                                <li><span class="text-semibold">create_email_verification_servers</span>: Allows customer to add email verification servers (yes|no)</li>
                                <li><span class="text-semibold">email_verification_servers_max</span>: Max email verification servers per customer (number, -1 for unlimited)</li>
                                <li><span class="text-semibold">list_import</span>: Customer can import list (yes|no)</li>
                                <li><span class="text-semibold">list_export</span>: Customer can export list (yes|no)</li>
                                <li><span class="text-semibold">all_sending_server_types</span>: Allow customer to add any sending server type (yes|no)</li>
                                <li><span class="text-semibold">sending_server_types</span>: (array)</li>
                                <li><span class="text-semibold">sending_server_option</span>: (system|own|subaccount)</li>
                                <li><span class="text-semibold">sending_server_subaccount_uid</span></li>
                            </ul>
                        </dd>',
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
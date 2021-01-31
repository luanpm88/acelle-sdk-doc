<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Notifications</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Acelle Notification API is also referred to as Web Hooks, allowing 3rd delivery service or application (like PowerMTA, Postfix, Exim...) to send a delivery or abuse report to Acelle for a given transaction which could be a success / bounce / feedback or abuse report</p>

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
                                'name' => 'message_id',
                                'type' => 'string',
                                'desc' => 'Message\'s id',
                            ],
                            [
                                'name' => 'type',
                                'type' => 'string',
                                'desc' => 'One of 4 types: sent | bounced | reported | failed',
                            ],
                            [
                                'name' => 'bounce_type',
                                'type' => 'string',
                                'desc' => 'Required if type is bounced',
                            ],
                            [
                                'name' => 'report_type',
                                'type' => 'string',
                                'desc' => 'Required if type is reported',
                            ],
                            [
                                'name' => 'description',
                                'type' => 'string',
                                'desc' => 'Notification message',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky">
                @include('docs.api._curl', [
                    'title' => 'VIEW SENT NOTIFICATIONS',
                    'curl' => [
                        'uri' => 'notifications',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'type', 'value' => 'sent'],
                        ],
                    ],
                    'php' => [
                        'function' => "notification()->read([
    'type' => 'sent',
])",
                        'lines' => 7,
                    ],
                ])

                @include('docs.api._curl', [
                    'title' => 'VIEW BOUNCED NOTIFICATIONS',
                    'curl' => [
                        'uri' => 'notifications',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'type', 'value' => 'bounced'],
                            ['name' => 'bounced_type', 'value' => 'hard'],
                            ['name' => 'description', 'value' => 'Email+address+does+not+exist'],
                        ],
                    ],
                    'php' => [
                        'function' => "notification()->read([
    'type' => 'bounced',
    'bounced_type' => 'hard',
])",
                        'lines' => 8,
                    ],
                ])

                @include('docs.api._curl', [
                    'title' => 'VIEW ABUSE NOTIFICATIONS',
                    'curl' => [
                        'uri' => 'notifications',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'type', 'value' => 'abuse'],
                            ['name' => 'report_type', 'value' => 'hard'],
                            ['name' => 'description', 'value' => 'Email+address+does+not+exist'],
                        ],
                    ],
                    'php' => [
                        'function' => "notification()->read([
    'type' => 'abuse',
    'report_type' => 'hard',
])",
                        'lines' => 8,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '{
    "message":"Comming..."
}',
                ])
            </div>
        </div>
    </div>
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Update Campaign</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        

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
                                'desc' => 'Name',
                            ],
                            [
                                'name' => 'subject',
                                'type' => 'string',
                                'desc' => 'Email subject',
                            ],
                            [
                                'name' => 'from_email',
                                'type' => 'string',
                                'desc' => 'From email',
                            ],
                            [
                                'name' => 'from_name',
                                'type' => 'string',
                                'desc' => 'From name',
                            ],
                            [
                                'name' => 'reply_to',
                                'type' => 'string',
                                'desc' => 'Reply to email',
                            ],
                            [
                                'name' => 'track_open',
                                'type' => 'string',
                                'desc' => 'Track open (true|false) - (optional) - default: true',
                            ],
                            [
                                'name' => 'track_click',
                                'type' => 'string',
                                'desc' => 'Track click (true|false) - (optional) - default: true',
                            ],
                            [
                                'name' => 'sign_dkim',
                                'type' => 'string',
                                'desc' => 'Add DKIM signature (true|false) - (optional) - default: true',
                            ],
                            
                            [
                                'name' => 'skip_failed_messages',
                                'type' => 'string',
                                'desc' => 'Skip failed messages (true|false) - (optional) - default: false',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'UPDATE CAMPAIGN',
                    'curl' => [
                        'uri' => 'login-token',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'mail_list_uid', 'value' => '{list_uid}'],
                            ['name' => 'name', 'value' => 'MyCampaign2'],
                            ['name' => 'subject', 'value' => 'HelloWorld2'],
                            ['name' => 'sign_dkim', 'value' => 'true'],
                        ],
                    ],
                    'php' => [
                        'function' => "campaign()->create([
    'mail_list_uid' => '{list_uid}',
    'name' => 'MyCampaign2',
    'subject' => 'HelloWorld2',
    'sign_dkim' => 'true',
])",
                        'lines' => 14,
                    ],
                    
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "Campaign was successfully updated",
    "campaign_uid": "5fd08d2ed4cc8"
}',
    ])
            </div>   
        </div>
    </div>
</div>
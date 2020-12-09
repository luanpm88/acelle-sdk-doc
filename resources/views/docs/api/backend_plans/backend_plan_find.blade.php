<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Find a Plan</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>List of all plans in json</p>

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
                    'title' => 'FIND PLANS',
                    'curl' => [
                        'uri' => 'login-token',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                ])

@include('docs.api._response', [
    'json' => '[
    {
        "uid":"58bd48f91fcab",
        "name":"Free",
        "price":"0.00",
        "currency_code":"USD",
        "frequency_amount":"1",
        "frequency_unit":"month",
        "options": {
            "email_max":"5000",
            "list_max":"10",
            "subscriber_max":"1000",
            "subscriber_per_list_max":"-1",
            "segment_per_list_max":"3",
            "campaign_max":"20",
            "automation_max":"10",
            "billing_cycle":"monthly",
            "sending_limit":"1000_per_hour",
            "sending_quota":1000,
            "sending_quota_time":1,
            "sending_quota_time_unit":"hour",
            "max_process":"1",
            "all_sending_servers":"yes",
            "max_size_upload_total":"500",
            "max_file_size_upload":"5",
            "unsubscribe_url_required":"yes",
            "access_when_offline":"no",
            "create_sending_domains":"no",
            "sending_servers_max":"-1",
            "sending_domains_max":"-1",
            "all_email_verification_servers":"yes",
            "create_email_verification_servers":"no",
            "email_verification_servers_max":"-1",
            "list_import":"yes","list_export":"yes",
            "all_sending_server_types":"yes",
            "sending_server_types": {
                "amazon-smtp":"yes",
                "amazon-api":"yes",
                "sendgrid-smtp":"yes",
                "sendgrid-api":"yes",
                "mailgun-api":"yes",
                "mailgun-smtp":"yes",
                "elasticemail-api":"yes",
                "elasticemail-smtp":"yes",
                "sparkpost-api":"yes",
                "sparkpost-smtp":"yes",
                "smtp":"yes",
                "sendmail":"yes",
                "php-mail":"yes"
            },
            "sending_server_option":
            "system",
            "sending_server_subaccount_uid":null,
            "api_access":"yes",
            "email_footer_enabled":"yes",
            "email_footer_trial_period_only":"no",
            "html_footer":"",
            "plain_text_footer":"",
            "payment_gateway":""
        },
        "status":"active",
        "color":"#008c6e",
        "quota":null,
        "custom_order":"1",
        "created_at":[],
        "updated_at":[]
    },
    ...
]',
                ])
                </div>
            </div>            
        </div>
    </div>
</div>
<div id="mail_lists" class="subsection">
    <h2 class="mb-4">Mail Lists</h2>
    <p>
        Manage mail lists
    </p>
    <div id="mail_lists_new" class="subsection mt-5">
        <h4 class="mb-4">Create New List</h4>
        <div class="row">
            <div class="col-md-6 pr-5">                        
                <p>Create a new list that contains contacts for sending emails</p>

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
                                    'desc' => 'List\'s name',
                                ],
                                [
                                    'name' => 'from_email',
                                    'type' => 'email',
                                    'desc' => 'Default From email address',
                                ],
                                [
                                    'name' => 'from_name',
                                    'type' => 'string',
                                    'desc' => 'Default From name',
                                ],
                                [
                                    'name' => 'default_subject',
                                    'type' => 'string',
                                    'desc' => 'Default email subject',
                                ],
                                [
                                    'name' => 'contact[company]',
                                    'type' => 'string',
                                    'desc' => 'Company name',
                                ],
                                [
                                    'name' => 'contact[state]',
                                    'type' => 'string',
                                    'desc' => 'State / Province / Region',
                                ],
                                [
                                    'name' => 'contact[address_1]',
                                    'type' => 'string',
                                    'desc' => 'Address 1',
                                ],
                                [
                                    'name' => 'contact[address_2]',
                                    'type' => 'string',
                                    'desc' => 'Address 2',
                                ],
                                [
                                    'name' => 'contact[city]',
                                    'type' => 'string',
                                    'desc' => 'City',
                                ],
                                [
                                    'name' => 'contact[zip]',
                                    'type' => 'string',
                                    'desc' => 'Zip / Postal code',
                                ],
                                [
                                    'name' => 'contact[phone]',
                                    'type' => 'string',
                                    'desc' => 'Phone',
                                ],
                                [
                                    'name' => 'contact[country_id]',
                                    'type' => 'string',
                                    'desc' => 'Country id',
                                ],
                                [
                                    'name' => 'contact[email]',
                                    'type' => 'email',
                                    'desc' => 'Email',
                                ],
                                [
                                    'name' => 'contact[url]',
                                    'type' => 'url',
                                    'desc' => 'Home page',
                                ],
                                [
                                    'name' => 'subscribe_confirmation',
                                    'type' => 'string',
                                    'desc' => 'Send subscription confirmation email (Double Opt-In)',
                                ],
                                [
                                    'name' => 'send_welcome_email',
                                    'type' => 'string',
                                    'desc' => 'Send a final welcome email',
                                ],
                                [
                                    'name' => 'unsubscribe_notification',
                                    'type' => 'string',
                                    'desc' => 'Send unsubscribe notification to subscribers',
                                ],
                                [
                                    'name' => 'send_welcome_email',
                                    'type' => 'string',
                                    'desc' => 'Send a final welcome email',
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
                            'uri' => 'lists',
                            'method' => 'POST',
                            'params' => [
                                ['name' => 'api_token', 'value' => '*|token_string|*'],
                                ['name' => 'name=', 'value' => 'List+1'],
                                ['name' => 'from_email', 'value' => 'admin@abccorp.org'],
                                ['name' => 'from_name', 'value' => 'ABC+Corp.'],
                                ['name' => 'default_subject', 'value' => 'Welcome+to+ABC+Corp.'],
                                ['name' => 'contact[company]', 'value' => 'ABC+Corp.'],
                                ['name' => 'contact[state]', 'value' => 'Armagh'],
                                ['name' => 'contact[address_1]', 'value' => '14+Tottenham+Court+Road+London+England'],
                                ['name' => 'contact[address_2]', 'value' => '44-46+Morningside+Road+Edinburgh+Scotland'],
                                ['name' => 'contact[city]', 'value' => 'Noname'],
                                ['name' => 'contact[zip]', 'value' => '80000'],
                                ['name' => 'contact[phone]', 'value' => '123+456+889'],
                                ['name' => 'contact[country_id]', 'value' => '1'],
                                ['name' => 'contact[email]', 'value' => 'info@abccorp.org'],
                                ['name' => 'contact[url]', 'value' => 'http://www.abccorp.org'],
                                ['name' => 'subscribe_confirmation', 'value' => '1'],
                                ['name' => 'send_welcome_email', 'value' => '1'],
                                ['name' => 'unsubscribe_notification', 'value' => '1'],
                            ],
                        ],
                    ])

                    @include('docs.api._response', [
                        'json' => '{
    "status": 1,
    "message": "List was successfully created",
    "list_uid": "5fc9e55410e10"
}',
                    ])
                </div>
            </div>
        </div>
    </div>
    

    <div id="mail_lists_all" class="subsection">
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

    <div id="mail_lists_find" class="subsection">
        <h4 class="mb-4">Find a List</h4>
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
                        'title' => 'FIND LIST',
                        'curl' => [
                            'uri' => 'lists/*|uid|*',
                            'method' => 'GET',
                            'params' => [
                                ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ],
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

    <div id="mail_lists_add_custom_field" class="subsection pb-0">
        <h4 class="mb-4">Add Custom Field</h4>
        <div class="row">
            <div class="col-md-7 pr-5">                        
                <p>The Stripe API is organized around <a href="http://en.wikipedia.org/wiki/Representational_State_Transfer" target="_blank" rel="noopener noreferrer">REST</a>. Our API has predictable resource-oriented URLs, accepts <a href="https://en.wikipedia.org/wiki/POST_(HTTP)#Use_for_submitting_web_forms" target="_blank" rel="noopener noreferrer">form-encoded</a> request bodies, returns <a href="http://www.json.org/" target="_blank" rel="noopener noreferrer">JSON-encoded</a> responses, and uses standard HTTP response codes, authentication, and verbs. </p>
                <p>You can use the Stripe API in test mode, which does not affect your live data or interact with the banking networks. The API key you use to <a href="#authentication">authenticate</a> the request determines whether the request is live mode or test mode.</p>
                <p>The Stripe API differs for every account as we release new <a href="#versioning">versions</a> and tailor functionality. <span>Log in to see docs customized to your version of the API, with your test key and data.</span></p>
                <p>Subscribe to Stripe's <a href="https://groups.google.com/a/lists.stripe.com/group/api-announce/">API announce mailing list</a> for updates.</p>
                <p class="mt-4"><span class="csat-widget-text">Was this section helpful?</span> <a href="#" class="ml-2 mr-2 font-weight-bold">Yes</a> <a href="#" class="font-weight-bold">No</a></p>
            </div>
            <div class="col-md-5">                        
                <div class="code-box">
                    <div class="box-header">
                        <div class="box-title">Per-request account</div>
                    </div>
                    <pre class="IntroSection-pre"><code>https://api.stripe.com</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>
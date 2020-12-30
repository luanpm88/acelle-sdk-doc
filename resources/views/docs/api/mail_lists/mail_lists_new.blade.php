<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Create New List</h4>
    <div class="row">
        <div class="col-md-6 pr-5">
            <p>A mail list is a collection of email addresses used by an individual or an organization to send marketing material to multiple recipients. You can have different lists of different group of contacts</p>

            <p>Make a POST request to the <code class="inline-code">/list</code> resource along with your desired list details to create. On success, a unique <code class="inline-code">List UID</code> key is returned for newly created list, which is used as a reference key for interacting with it.</p>

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
                            ['name' => 'name', 'value' => 'List+1'],
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
                    'php' => [
                        'function' => "list()->create([
    'name' => 'List+1',
    'from_email' => 'admin@abccorp.org',
    'from_name' => 'ABC+Corp.',
    'default_subject' => 'Welcome+to+ABC+Corp.',
    'contact' => [
        'company' => 'ABC+Corp.',
        'state' => 'Armagh',
        'address_1' => '14+Tottenham+Court+Road+London+England',
        'address_2' => '44-46+Morningside+Road+Edinburgh+Scotland',
        'city' => 'Noname',
        'zip' => '80000',
        'phone' => '123+456+889',
        'country_id' => '1',
        'email' => 'info@abccorp.org',
        'url' => 'http://www.abccorp.org',                
    ],
    'subscribe_confirmation' => '1',
    'send_welcome_email' => '1',
    'unsubscribe_notification' => '1',
])",
                    'lines' => 25,
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
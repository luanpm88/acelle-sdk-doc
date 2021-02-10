<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">List Sending Servers</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>A sending server in Acelle is actually a connection to a sending server or service. Normally, it is an SMTP server which actually delivers marketing emails. You can configure Acelle to sends email through a remote SMTP server or a local mailer program installed in the hosting server itself. Acelle currently does not support creating a sending server via API, you may want to login to the web UI to do it. However, you can list all available sending servers in the system using API.</p>

            <div class="mt-4">
                <h5>Parameters</h5>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'api_token',
                                'type' => 'string',
                                'desc' => 'User\'s API token. You can find it in your profile settings page',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'VIEW SENDING SERVERS',
                    'curl' => [
                        'uri' => 'sending_servers',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "sending_server()->all()",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', [
                    'json' => '[
    {
        "uid":"5fc273b9ded36",
        "name":"Amazon API",
        "created_at":"2020-11-28 15:58:49",
        "updated_at":"2020-11-28 15:58:53"
    }
]',
                ])
            </div>
        </div>
    </div>
</div>
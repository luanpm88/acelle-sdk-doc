<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">Find a Campaign</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Get information in details of a given campaign identified by <code>UID</code></p>

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
                                'desc' => 'Campaign\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'FIND CAMPAIGN',
                    'curl' => [
                        'uri' => 'campaigns/<span class="hljs-keyword">{uid}</span>',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "campaign()->find('5fb48ff221b27')",
                        'lines' => 5,
                    ],
                ])

                @include('docs.api._response', ['json' => '{
    "campaign": {
        "uid":"5fb48ff221b27",
        "name":"Untitled",
        "list":"",
        "segment":"",
        "default_subject":null,
        "from_email":"luanpm@live.com",
        "from_name":"Luan Pham",
        "remind_message":null,
        "status":"new",
        "created_at":[],
        "updated_at":[]
    },
    "statistics": {
        "subscriber_count":4,
        "uniq_open_rate":0,
        "delivered_rate":0,
        "open_count":0,
        "uniq_open_count":0,
        "last_open":"",
        "click_rate":0,
        "click_per_uniq_open":0,
        "click_count":0,
        "abuse_feedback_count":0,
        "last_click":"",
        "bounce_count":0,
        "unsubscribe_count":0,
        "links":[],
        "top_locations":[],
        "top_open_subscribers":[]
    }
}',
                ])
            </div>
        </div>
    </div>
</div>
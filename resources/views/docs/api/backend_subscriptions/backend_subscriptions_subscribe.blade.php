<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Subscribe customer to a plan</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Subscribe customer to a plan</p>

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
                                'name' => 'customer_uid',
                                'type' => 'string',
                                'desc' => 'Customer\'s uid',
                            ],
                            [
                                'name' => 'plan_uid',
                                'type' => 'string',
                                'desc' => 'Plan\'s uid',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'SUBSCRIBE',
                    'curl' => [
                        'uri' => 'subscriptions',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                            ['name' => 'customer_uid', 'value' => '*|customer_uid|*'],
                            ['name' => 'plan_uid', 'value' => '*|plan_uid|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "subscription()->create([
    'customer_uid' => '5fd1a0097ce01',
    'plan_uid' => '5fd1a16fb8f27',
])",
                        'lines' => 8,
                    ],                    
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "Assigned Anna plan to Free plan successfully.",
    "customer_uid": "5fd093b62ea11",
    "plan_uid": "acv093b62erfg"
}',
    ])
            </div>   
        </div>
    </div>
</div>
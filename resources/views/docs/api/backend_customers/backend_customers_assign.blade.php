<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Assign Plan</h2>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>Assign a plan to a customer. In other words, subscribe a user to a plan. Then the customer will then be able to login to the application and proceed with paying for the plan. If the plan is free, then the user is subscribed and can immediately use the features.</p>

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
                                'desc' => 'Customer\'s uid',
                            ],
                            [
                                'name' => 'plan_uid',
                                'type' => 'string',
                                'desc' => 'Plan\'s uid',
                            ],
                            [
                                'name' => 'disable_billing',
                                'type' => 'boolean',
                                'desc' => 'Activate the subscription without checking out. Default: false',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-6">              
            <div class="sticky two-blocks">
                @include('docs.api._curl', [
                    'title' => 'ASSIGN PLAN',
                    'curl' => [
                        'uri' => 'customers/<span class="hljs-keyword">{uid}</span>/assign-plan/<span class="hljs-keyword">{plan_uid}</span>',
                        'method' => 'POST',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "customer()->assignPlan('5fd1a0097ce01', '5fd1a16fb8f27')",
                        'lines' => 5,
                    ],                    
                ])

@include('docs.api._response', [
    'json' => '{
    "status": 1,
    "message": "Customer was assigned to plan",
    "customer_uid": "5fd093b62ea11"
}',
    ])
            </div>   
        </div>
    </div>
</div>
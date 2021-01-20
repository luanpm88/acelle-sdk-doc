<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-7 pr-5">                        
            <p>Below are POST parameter passed to the server along with the request</p>

            <div class="mt-4">
                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'content',
                                'type' => 'string',
                                'desc' => 'HTML content of the design, including any update made to the design. Simply store its value to a server&#39;s database like MySQL, PostgreSQL, Oracle or any other database management system',
                            ],
                            [
                                'name' => 'token',
                                'type' => 'string',
                                'desc' => 'CSRF token just in case your server requires it',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-5">                        
            
        </div>
    </div>
</div>
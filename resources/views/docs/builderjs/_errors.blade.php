<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">{{ $resource['title'] }}</h2>

    <div class="row pb-5">
        <div class="col-md-6">
            <p>For reference, the following error codes should be used by the server side scripting to better communicate with BuilderJS</p>

            <div class="mt-4">
                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => '400',
                                'desc' => 'Bad Request -- Your request is invalid.',
                            ],
                            [
                                'name' => '401',
                                'desc' => 'Unauthorized -- Your API key is wrong.',
                            ],
                            [
                                'name' => '403',
                                'desc' => 'Forbidden -- The kitten requested is hidden for administrators only.',
                            ],
                            [
                                'name' => '404',
                                'desc' => 'Not Found -- The specified kitten could not be found.',
                            ],
                            [
                                'name' => '405',
                                'desc' => 'Method Not Allowed -- You tried to access a kitten with an invalid method.',
                            ],
                            [
                                'name' => '406',
                                'desc' => 'Not Acceptable -- You requested a format that isn\'t json.',
                            ],
                            [
                                'name' => '410',
                                'desc' => 'Gone -- The kitten requested has been removed from our servers.',
                            ],
                            [
                                'name' => '418',
                                'desc' => 'I\'m a teapot.',
                            ],
                            [
                                'name' => '429',
                                'desc' => 'Too Many Requests -- You\'re requesting too many kittens! Slow down!',
                            ],
                            [
                                'name' => '500',
                                'desc' => 'Internal Server Error -- We had a problem with our server. Try again later.',
                            ],
                            [
                                'name' => '503',
                                'desc' => 'Service Unavailable -- We\'re temporarily offline for maintenance. Please try again later.',
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        
        <div class="col-md-6">                        
           
        </div>
    </div>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
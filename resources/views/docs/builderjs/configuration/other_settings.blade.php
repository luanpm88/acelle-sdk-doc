<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-7 pr-5">                        
            <p>Below is the complete list of configuration settings (optional) that can be passed to the Builder construction</p>

            <div class="mt-4">
                <h6>Construction Parameters</h6>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'url',
                                'type' => 'string',
                                'desc' => 'URL of the template to be loaded. If not provided, BuildJS will load a blank design page',
                            ],
                            [
                                'name' => 'backUrl',
                                'type' => 'string',
                                'desc' => 'URL of the page that builder redirects to when Exit or Back button is clicked',
                            ],
                            [
                                'name' => 'templates',
                                'type' => 'string',
                                'desc' => 'List of templates available for user to choose from. See Templates section for details',
                            ],
                            [
                                'name' => 'title',
                                'type' => 'string',
                                'desc' => 'Title to set for the current HTML page, overwriting the <code>&lt;title&gt;</code> tag value',
                            ],
                            [
                                'name' => 'saveUrl',
                                'type' => 'string',
                                'desc' => 'The URL to which BuilderJS submits its latest content for storing (handled by server script). See Storage section for details',
                            ],
                            [
                                'name' => 'tags',
                                'type' => 'string',
                                'desc' => 'Tags used by the BuilderJS to represent a dynamic value. See Tags section for the details',
                            ],
                            [
                                'name' => 'view',
                                'type' => 'string',
                                'desc' => 'The parent element to which BuilderJS renders its content. It is <code>document.root</code> by default',
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
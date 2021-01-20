<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>By default BuilderJS loads with a blank design for you to start making your own HTML email or page. You can also start working with an existing email or page template by loading it into the design view. There are 2 ways of loading an existing template:</p>
            <h5 id='from-an-html-string' class="mt-5 mb-3">From an HTML string</h5>
            <p>Use the <code>load(html)</code> function, passing an HTML string. See code example in the right panel</p>
            <div class="mt-4">
                <h6>Parameters</h6>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'html',
                                'type' => 'string',
                                'default' => '[empty]',
                                'desc' => 'HTML content for loading to the viewer',
                            ],
                        ],
                    ])
                </div>
            </div>

            <aside class="alert alert-warning mt-4">
                <i class="material-icons-outlined">error_outline</i> Loading a template from an HTML string is not a good practice and is, in general, not recommended. The preferred way is to load it from a public URL. See section below for details
            </aside>
            <h5 id='from-an-html-string' class="mt-5 mb-3">From a public URL</h5>
            <p>Very often, your template is also available as a public URL. Then you can pass it to the <code>url</code> parameter to your builder initialization code. See example in the right panel</p>
            
            <div class="mt-4">
                <h6>Parameters</h6>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'url',
                                'type' => 'string',
                                'default' => 'null',
                                'desc' => 'URL to the template page which will be fetched and loaded to the builder',
                            ],
                        ],
                    ])
                </div>
            </div>

            <aside class="alert alert-success mt-4">
                <i class="material-icons-outlined">check_circle_outline</i> You can try passing with any URL to the `url` parameter of the builder initialization function for experiment. BuilderJS can load also every website with HTML content to its design view
            </aside>

            <h5 id='from-an-html-string' class="mt-5 mb-3">Upload a template</h5>
            <p>Remember that BuildJS is a pure front-end application. Uploading a template to the server requires server scripting language like Ruby on Rails, PHP, Java... to handle file upload and pass the URL of the newly uploaded template as <code>url</code> parameter of the builder construction function.</p>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.builderjs._html', [
                    'title' => 'From an HTML string',
                    'lines' => 2,
                    'html' => 'var builder = new Editor({ root: &#x27;/project/dist/&#x27; });
builder.load(&#x27;&#x3C;div&#x3E; &#x3C;h1&#x3E;Awesome title&#x3C;/h1&#x3E; &#x3C;p&#x3E; Page content... &#x3C;/p&#x3E; &#x3C;/div&#x3E;&#x27;)
',
                ])

                @include('docs.builderjs._html', [
                    'title' => 'From a public URL',
                    'lines' => 6,
                    'html' => 'var builder = new Editor({
    root: &#x27;/project/dist/&#x27;,
    url: &#x27;http://example.com/template/2001990&#x27;
});

builder.init();',
                ])
            </div>
        </div>
    </div>
</div>
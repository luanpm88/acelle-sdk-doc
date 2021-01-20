<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-6 pr-5">                        
            <p>BuilderJS allows you to create new blank workspace and build your design from scratch.
                However, most of the time, you may want to start making your own email or page design from an existing template, then taylor it to your own needs.</p>
                
                <p>You can also pass a list of available templates to BuilderJS, and it will in turn show up to user for choosing from, by going to <code>Design &gt; New From Template</code></p>
                
                <p><img width="100%" src="https://builderjs.s3.amazonaws.com/BuilderJS-Template-Selection.png" title="Available Templates selection" alt="Available Templates selection" /></p>
                
                <p>See example on the right to find out how to pass a list of available templates to your builder.</p>
        </div>
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.builderjs._html', [
                    'title' => 'Example',
                    'lines' => 30,
                    'width' => '600',
                    'html' => '// Pass a list of available templates to the builder
// which will be available for user to choose from
// by going to Design &#x3E; New From A Template

// List of available templates
var templates = [
  {
      name: &#x27;My Awesome Template 1&#x27;,
      url: &#x27;http://example.com/template/030331&#x27;,
      thumbnail: &#x27;http://example.com/template/030331/thumb.png&#x27;
  }, {
      name: &#x27;My Awesome Template 2&#x27;,
      url: &#x27;http://example.com/template/030332&#x27;,
      thumbnail: &#x27;http://example.com/template/030332/thumb.png&#x27;
  }, {
      name: &#x27;My Awesome Template 3&#x27;,
      url: &#x27;http://example.com/template/030333&#x27;,
      thumbnail: &#x27;http://example.com/template/030333/thumb.png&#x27;
  }, {
      name: &#x27;My Awesome Template 4&#x27;,
      url: &#x27;http://example.com/template/030334&#x27;,
      thumbnail: &#x27;templates/030334/thumb.png&#x27;
  }
];

// Pass to the builder
var builder = new Editor({
    root: &#x27;/project/dist/&#x27;,
    templates: templates
});',
                ])

                <div class="code-box response">
                    <div class="box-header">
                        <div class="box-title">NOTICE</div>
                    </div>
                    <div class="code-blocks p-3">
                        <p>That templates parameter expects an array of templates, each with name, url and thumbnail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
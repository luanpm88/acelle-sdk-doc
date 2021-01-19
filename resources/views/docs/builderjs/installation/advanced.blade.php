<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-10 pr-5">                        
        <p>See the right panel for a more complicated setup. See the <strong>Configuration</strong> section for advanced installation options which provide you more control over how the builder functions.</p>
<p>By default, BuilderJS renders its HTML content to the <code>document.body</code> element of the page. i.e. the builder view will occupy the whole page. You can also configure it to render to a child element of your page.</p>
        </div>
        <div class="col-md-10 mt-5">                        
            <div class="sticky two-blocks">
                <div class="code-box response">
                    <div class="box-header">
                        <div class="box-title">NOTICE</div>
                    </div>
                    <div class="code-blocks p-3">
                    <p>The <code>"root"</code> parameter which is important for BuilderJS to find the related resources. For example, if your builderjs distributable (<code>dist</code>) is available at <code>http://example.com/project/dist/</code>, then you need to set your <code>"root"</code> value to <code>"/project/dist/"</code>. Remember to keep both leading and trailing slashes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
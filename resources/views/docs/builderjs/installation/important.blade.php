<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-10 pr-5">                        
            <p>Notice the <code>"root"</code> parameter which is important for BuilderJS to find the related resources. For example, if your BuilderJS distributable <code>dist/</code> folder is available at <code>http://example.com/project/dist/</code>, then you need to set your <code>"root"</code> value to an <strong>absolute path</strong> of <code>"/project/dist/"</code>. Remember to <strong>add both leading and trailing slashes</strong></p>
            <aside class="alert alert-warning mt-5">
                <i class="material-icons-outlined">error_outline</i>
                Instantiate the <code>builder</code> object and use <code>init()</code> helper function is the easiest way to get started with the builder. See more advanced configuration options in the next sections of this document.
            </aside>
        </div>
        <div class="col-md-5">                        
            
        </div>
    </div>
</div>
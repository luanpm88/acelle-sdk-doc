<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">{{ $resource['title'] }}</h2>

    <div class="row pb-5">
        <div class="col-md-6">
            <p>BuilderJS is written in a well designed structure, allowing easy and straightforward customization. For example, you can add your own widget to the library beside the default ones like Text, Image, Video, Social Network Icons, etc. See the right panel, <code>javascript</code> tab to find out how to write a custom widget.</p>

            <p>By extending the Widget base class, your <code>MySampleWidget</code> will automatically inherit all behaviors of a common widget like drag &amp; drop enabled, move/duplicate/delete support. You can specify its own characteristics like title, thumbnail, etc. by overwriting the corresponding methods.</p>

            <p>Documentation is being updated. In the mean time, please contact us for more details on this topic.</p>
            
        </div>
        
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.builderjs._html', [
                    'title' => 'From a public URL',
                    'lines' => 9,
                    'html' => 'class MySampleWidget extends Widget {
// get HTML to insert into content
init() {
    super.init();
}

title() {
    return &#x27;My Sample Widget&#x27;;
}

renderHtml() {
    return &#x27;&#x3C;div&#x3E; A Simple Widget with 1 line of text &#x3C;/div&#x3E;&#x27;;
}

// custom behavior goes here...',
                ])
            </div>
        </div>
    </div>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
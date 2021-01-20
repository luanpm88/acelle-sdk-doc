<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">{{ $resource['title'] }}</h2>

    <div class="row pb-5">
        <div class="col-md-6">
            <p>Since BuilderJS is a pure JavaScript library, accepting parameters passed to its initialization, it is open to any kind of integration no matter what your programming language or database system is.</p>
            <p>All its job is to load a template in HTML, allow user to make changes using its visual drag &amp; drop or source edit then submit the changes to the server for storing. You can use PHP, Ruby, Python, Java, .NET or any other server side scripting language to handle BuilderJS requests. In the distributable package, we also include sample PHP scripts for saving, exporting, etc.</p>
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
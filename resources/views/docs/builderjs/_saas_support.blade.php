<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">{{ $resource['title'] }}</h2>
    
    <div class="row pb-5">
        <div class="col-md-6">
            <p>BuilderJS is also suitable for SAAS (Software as a Service). That is, you have control of how BuilderJS features are available to your users. For example, you can always turn a feature ON or OFF for different classes of users.</p>

            <p>Documentation is being updated. In the mean time, please contact us for more details on this topic.</p>
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
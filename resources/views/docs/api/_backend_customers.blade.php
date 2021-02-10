<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Customers</h2>
    <p class="mb-5">
        In Acelle, customers sign up against the web application to create an account and subscribe to a service plan (free, standard, premium... for example) then pay for it in order to use the system's functionality. Acelle API allows you to manage your customers and subscriptions which is helpful when you use Acelle with another application or system.
    </p>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
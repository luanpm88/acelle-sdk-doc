<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Subscriptions</h2>
    <p class="mb-5">
        Manage user subscriptions to plans. You can create a new subscription, activate a pending subscription or cancel a subscription.<br>
        Normally, users can sign up to the system, subscribe to a plan and proceed with the payment.<br>The API is helpful in case you want to quickly assign a plan to a user.
    </p>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Understanding of Service Plans and Subscription</h2>
    <p>
Acelle is pre-designed as an SAAS (Software as a service) platform, allowing you to host it under your brand and charge your users for register and use its features. When you start your hosting reselling business, you should define how you will offer your hosting resources and services to customers. Acelle lets you organize your business by means of service plans and subscriptions.</p>
<p class="mb-5">A service plan is a combination of hosting resources that you sell to your customers. For example, a plan can provide customers with the contacts/lists management service, a maximum of 100,000 contacts stored on the server, and 1 million email sending credits each month.</p>
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
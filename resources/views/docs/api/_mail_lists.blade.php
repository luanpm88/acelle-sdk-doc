<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Mail Lists</h2>
    <p class="mb-5">
        Your Acelle Mail List (also referred to as Audience) is the center of email marketing management system. It is designed to help you collect and manage subscribed, non-subscribed, and unsubscribed contacts. Acelle Mail's LIST API allows you to create, edit your mail lists as well as manage your lists' contacts.
    </p>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
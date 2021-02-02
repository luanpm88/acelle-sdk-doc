<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Lists</h2>
    <p class="mb-5">
        Mail Lists, also referred to as Audience, are at the center of email marketing management systems.<br>It is designed to help you collect and manage subscribed, non-subscribed, and unsubscribed contacts.<br>Acelle's List API allows you to create, edit your mail lists as well as manage your lists' contacts.
    </p>
    
    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>
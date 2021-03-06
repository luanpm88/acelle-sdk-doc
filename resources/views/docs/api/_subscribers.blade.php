<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Subscribers</h2>
    <p class="mb-5">
        By definition, a subscriber is usually someone who is a member of one or more of your lists.<br>They may have subscribed themselves to your mail list via a subscription page or web form, or you may have imported their details from another source.<br>Subscribers are also referred to as Audience in <a href="https://codecanyon.net/item/acelle-email-marketing-web-application/17796082" target="_blank">Acelle email marketing web platform</a>
    </p>

    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
    
</div>
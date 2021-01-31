<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">Campaigns</h2>
    <p>
        An email marketing campaign is a coordinated set of individual email messages that are deployed across a specific period of time with one specific purpose. These specific purposes or calls-to-action (CTAs) can include the following: download a white paper, sign up for a webinar, or make a purchase. Acelle allows you to create a marketing campaign targeting one or more list of your audience. You can also set up a campaign that targets a segement of a given list, rather than the entire list 
    </p>
    <p class="mb-5">
        IMPORTANT: as of version <code>1.0</code>, Acelle API for campaigns is limited to READ ONLY methods. For setting up and run a campaign, user will need to login to the web UI.
    </p>

    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif
</div>
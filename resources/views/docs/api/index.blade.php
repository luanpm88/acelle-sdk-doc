@extends('layouts.api')

{{-- Overview: the introduction, the guides, and every endpoint with a link to its page. --}}
@section('content')
    @include('docs.api._introduction')

    <div id="guides" class="subsection subsection-short">
        <h2 class="mb-4">Guides</h2>
        <div class="row">
            @foreach ($reference->guides() as $guide)
                <div class="col-md-4 mb-3">
                    <a class="guide-card" href="{{ route('guide', $guide['slug']) }}">{{ $guide['title'] }}</a>
                </div>
            @endforeach
        </div>
    </div>

    @php
        $groups = [
            'customer' => ['Customer API', "Called with a customer's API token: that customer's lists, contacts, campaigns and automations."],
            'admin' => ['Admin API', "Called with an admin's API token: customers, subscriptions, sending servers and maintenance."],
        ];
    @endphp
    @foreach ($groups as $audience => [$groupName, $groupIntro])
        <div id="{{ $audience }}-api" class="subsection subsection-short">
            <h2 class="mb-2">{{ $groupName }}</h2>
            <p class="mb-4">{{ $groupIntro }}</p>

            @foreach ($reference->sections($audience) as $catalogSection)
                <div class="catalog-section">
                    <h3 class="h5"><a href="{{ route('section', $catalogSection['slug']) }}">{{ $catalogSection['name'] }}</a></h3>
                    @if ($catalogSection['description'] !== null)
                        <p class="attribute-desc">{{ $catalogSection['description'] }}</p>
                    @endif
                    @include('docs.api._endpoint_list', ['section' => $catalogSection])
                </div>
            @endforeach
        </div>
    @endforeach
@endsection

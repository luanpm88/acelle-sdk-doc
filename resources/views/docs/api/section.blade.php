@extends('layouts.api')

@section('content')
    <div id="{{ $section['slug'] }}" class="subsection">
        <p class="page-kicker">
            {{ $section['audience'] === 'admin' ? 'Admin API' : 'Customer API' }}
        </p>
        <h1 class="h2 mb-3">{{ $section['name'] }}</h1>
        @if ($section['description'] !== null)
            <p class="mb-5">{{ $section['description'] }}</p>
        @endif

        @include('docs.api._endpoint_list', ['section' => $section])
    </div>
@endsection

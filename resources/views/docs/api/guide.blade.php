@extends('layouts.api')

@section('content')
    <div id="{{ $guide['slug'] }}" class="subsection">
        <p class="page-kicker">Guide</p>
        <h1 class="h2 mb-4">{{ $guide['title'] }}</h1>
        <div class="row">
            <div class="col-lg-8 doc-prose">
                {!! $guide['html'] !!}
            </div>
        </div>
    </div>
@endsection

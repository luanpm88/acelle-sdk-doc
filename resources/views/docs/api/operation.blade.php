@extends('layouts.api')

{{-- One endpoint: what it does and takes on the left, a request and its answers on the right. --}}
@section('content')
    @php
        $sdkCall = $operation['codeSamples'] === [] ? null : $operation['codeSamples'][0]['source'];
        $examples = array_values(array_filter($operation['responses'], function ($response) {
            return $response['example'] !== null;
        }));
    @endphp
    <div id="{{ $operation['slug'] }}" class="subsection">
        <div class="row">
            <div class="col-md-6 pr-md-5">
                <p class="page-kicker">
                    <a href="{{ route('section', $section['slug']) }}">{{ $section['name'] }}</a>
                    @if ($section['audience'] === 'admin')
                        <span class="audience-badge">Admin API</span>
                    @endif
                </p>
                <h1 class="h4 mb-3">{{ $operation['summary'] }}</h1>
                <p class="endpoint-line">
                    <span class="http-method http-method-{{ strtolower($operation['method']) }}">{{ $operation['method'] }}</span>
                    <code class="inline-code">{{ $operation['path'] }}</code>
                </p>
                @if ($operation['public'])
                    <p class="attribute-desc">No API token needed.</p>
                @endif

                @if ($operation['description'] !== null)
                    <div class="doc-prose">{!! $operation['description'] !!}</div>
                @endif

                @if ($operation['parameters'] !== [])
                    <div class="mt-4">
                        <h5>Parameters</h5>
                        <div class="mt-3">
                            @include('docs.api._attributes', ['rows' => $operation['parameters']])
                        </div>
                    </div>
                @endif

                @foreach ($operation['bodies'] as $body)
                    <div class="mt-4">
                        <h5>Request body <span class="content-type">{{ $body['type'] }}</span></h5>
                        <div class="mt-3">
                            @include('docs.api._attributes', ['rows' => $body['fields']])
                        </div>
                        @if ($body['more'] !== null)
                            <p class="attribute-desc">{!! $body['more'] !!}</p>
                        @endif
                    </div>
                @endforeach

                <div class="mt-4">
                    <h5>Responses</h5>
                    <div class="mt-3">
                        @foreach ($operation['responses'] as $response)
                            <div class="attribute-row">
                                <span class="attribute-title">{{ $response['status'] }}</span>
                                <span class="attribute-desc">{!! $response['description'] !!}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sticky two-blocks">
                    @foreach ($operation['samples'] as $i => $sample)
                        @include('docs.api._curl', [
                            'title' => count($operation['samples']) > 1
                                ? $operation['summary'].' · '.\Illuminate\Support\Str::after($sample['label'], ', ')
                                : $operation['summary'],
                            'curl' => $sample['code'],
                            'php' => $i === 0 ? $sdkCall : null,
                        ])
                    @endforeach

                    @if ($examples !== [])
                        @include('docs.api._response', ['examples' => $examples])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

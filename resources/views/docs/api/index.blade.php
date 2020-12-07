@extends('layouts.api')

@section('content')
    <div class="content">

        @include('docs.api._sidebar')

        <div class="main-content">
            
            @include('docs.api._topmenu')

            <div class="inner-content">
                @foreach ($resources as $resource)
                    {!! $resource['content'] !!}
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $('.theme-toggle').on('click', function() {
            body = $(this).closest('body');

            if (body.hasClass('dark-theme')) {
                body.removeClass('dark-theme');
            } else {
                body.addClass('dark-theme');
            }

            $.ajax({
                method: "POST",
                url: "{{ action("App\Http\Controllers\Docs\ApiController@saveTheme") }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    theme: body.hasClass('dark-theme') ? 'dark-theme' : 'default-theme'
                }
            })
            .done(function( msg ) {
                console.log('theme changed!');
            });
        });

        $('.group-head').on('click', function() {
            box = $(this).closest('.sidebar-group');

            if (box.hasClass('closed')) {
                box.removeClass('closed');
            } else {
                box.addClass('closed');
            }
        });

        $('.lang-toggle').on('click', function() {
            var body = $(this).closest('body');
            var lang = $(this).attr('data-type');

            $.ajax({
                method: "POST",
                url: "{{ action("App\Http\Controllers\Docs\ApiController@saveLang") }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    lang: lang
                }
            })
            .done(function( msg ) {
                console.log('lang changed!');
            });
        });
        
        $('.SelectClientLibrary-lang').on('click', function() {
            var link = $(this);
            var type = link.attr('data-type');

            $('body').removeClass('php');
            $('body').removeClass('curl');

            $('body').addClass(type);
        });

        $('select.lang-switch').on('change', function() {
            var link = $(this);
            var type = link.val();

            $('body').removeClass('php');
            $('body').removeClass('curl');

            $('body').addClass(type);

            $('select.lang-switch').val(type);
        });

        $('select.lang-switch').on('change', function() {
            var body = $(this).closest('body');
            var lang = $(this).val();

            $.ajax({
                method: "POST",
                url: "{{ action("App\Http\Controllers\Docs\ApiController@saveLang") }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    lang: lang
                }
            })
            .done(function( msg ) {
                console.log('lang changed!');
            });
        });
    </script>
@endsection
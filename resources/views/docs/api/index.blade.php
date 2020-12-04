@extends('layouts.api')

@section('content')
    <div class="content">

        @include('docs.api._sidebar')

        <div class="main-content">
            
            @include('docs.api._topmenu')

            <div class="inner-content">
                @include('docs.api._introduction')

                @include('docs.api._authentication')
                
                @include('docs.api._mail_lists')

                @include('docs.api._subscribers')

                @include('docs.api._campaigns')
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
    </script>
@endsection
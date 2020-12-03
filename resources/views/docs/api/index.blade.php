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
        $(document).ready(function () {
            $('.main-content').on("scroll", onScroll);
            
            //smoothscroll
            $('.main-menu a[href^="#"]').on('click', function (e) {
                e.preventDefault();
                $(document).off("scroll");
                
                $('a').each(function () {
                    $(this).removeClass('current');
                })
                $(this).addClass('current');
            
                var target = this.hash,
                    menu = target;
                $target = $(target);
                $('.main-content').stop().animate({
                    'scrollTop': $target.offset().top+2
                }, 500, 'swing', function () {
                    window.location.hash = target;
                    $('.main-content').on("scroll", onScroll);
                });
            });
        });

        function onScroll(event){
            var scrollPos = $('.main-content').scrollTop();
            $('.main-menu a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr("href"));
                if (refElement.position().top <= 0 && refElement.position().top + refElement.outerHeight() > 0) {
                    $('.main-menu a').removeClass("current");
                    currLink.addClass("current");
                }
                else{
                    currLink.removeClass("current");
                }
            });
        }

        $('.theme-toggle').on('click', function() {
            body = $(this).closest('body');

            if (body.hasClass('dark-theme')) {
                body.removeClass('dark-theme');
            } else {
                body.addClass('dark-theme');
            }
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
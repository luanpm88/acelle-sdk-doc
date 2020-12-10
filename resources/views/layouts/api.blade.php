<html>
    <head>
        <title>Acelle API</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <link rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.0/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>

        <!-- PNotify -->
        <link href="{{ url('lib/pnotify-4.0.0/PNotifyBrightTheme.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ url('lib/pnotify-4.0.0/iife/PNotify.js') }}"></script>
        <script src="{{ url('lib/pnotify-4.0.0/iife/PNotifyButtons.js') }}"></script>
        <script src="{{ url('lib/nonblockjs/NonBlock.js') }}"></script>
        <script>
            "use strict";
            
            PNotify.defaults.styling = 'bootstrap4';
        </script>

        <script type="text/javascript" src="{{ url('lib/tooltipster/js/tooltipster.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('lib/tooltipster/css/tooltipster.bundle.min.css') }}">
        <link rel="stylesheet" href="{{ url('lib/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css') }}">
        
        <link rel="stylesheet" href="{{ url('css/dracula.css') }}">

        <link rel="stylesheet" href="{{ url('css/app.css') }}">

        <script>
            function copyToClipboard(text) {
                var $temp = $("<textarea>");
                var brRegex = /<br\s*[\/]?>/gi;
                $("body").append($temp);
                $temp.val(text.replace(brRegex, "\r\n")).select();
                document.execCommand("copy");
                $temp.remove();
            }

            function notify(type, title, message) {
            if (typeof window.stackBottomRight === 'undefined') {
                window.stackBottomRight = {
                    'dir1': 'up',
                    'dir2': 'left',
                    'firstpos1': 25,
                    'firstpos2': 25
                };
            }
            var opts = {
                type: type,
                title: title,
                text: message,
                stack: window.stackBottomRight,
                addClass: 'nonblock',
                delay: 2000,
                textTrusted: true,
                titleTrusted: true,
            };
            PNotify.alert(opts);
        }
        </script>
    </head>
    <body class="{{ session('theme') }} {{ session('lang') ? session('lang') : 'php' }}">
        <div class="container-fluid">
            @yield('content')
        </div>

        <script>
            $('.ClickToCopy').on('click', function() {
                var code = $(this).closest('.InstallClientLibrary').find('code:visible');
        
                copyToClipboard(code.text().replace(/\n/g, '<br>'));

                notify('success', 'Success', 'Code was copied to clipboard!');
            });
            
            $('.box-copy').on('click', function() {
                var code = $(this).closest('.code-box').find('code:visible');
        
                copyToClipboard(code.text().replace(/\n/g, '<br>'));

                notify('success', 'Success', 'Code was copied to clipboard!');
            });

            $('.xtooltip').tooltipster({
                @if (session('theme') != 'dark-theme')
                    theme: 'tooltipster-light'
                @endif
            });
        </script>
    </body>
</html>
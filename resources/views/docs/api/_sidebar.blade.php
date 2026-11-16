<div class="sidebar pt-3">
    <div class="sidebar-head d-flex mb-3 pr-2">
        <a class="logo mr-auto" href="{{ route('home') }}" title="{{ config('brand.site_name') }}">
            {{-- The logos of acellesend.com: dark text for the light theme, the version for dark backgrounds. --}}
            <img class="logo-light" src="{{ asset('images/logo_dark.svg') }}" alt="{{ config('brand.name') }}" width="109" height="24">
            <img class="logo-dark" src="{{ asset('images/logo_on_dark.svg') }}" alt="" aria-hidden="true" width="109" height="24">
        </a>
        <div class="">
            <span class="theme-toggle">
                <span class="circle-box">
                    <span class="icon light-icon">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg LightModeIcon-svg SVG--color-svg" style="width: 12px;height: 12px;" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M3.828 5.243L2.343 3.757a1 1 0 0 1 1.414-1.414l1.486 1.485a5.027 5.027 0 0 0-1.415 1.415zM7 3.1V1a1 1 0 1 1 2 0v2.1a5.023 5.023 0 0 0-2 0zm3.757.728l1.486-1.485a1 1 0 1 1 1.414 1.414l-1.485 1.486a5.027 5.027 0 0 0-1.415-1.415zM12.9 7H15a1 1 0 0 1 0 2h-2.1a5.023 5.023 0 0 0 0-2zm-.728 3.757l1.485 1.486a1 1 0 1 1-1.414 1.414l-1.486-1.485a5.027 5.027 0 0 0 1.415-1.415zM9 12.9V15a1 1 0 0 1-2 0v-2.1a5.023 5.023 0 0 0 2 0zm-3.757-.728l-1.486 1.485a1 1 0 0 1-1.414-1.414l1.485-1.486a5.027 5.027 0 0 0 1.415 1.415zM3.1 9H1a1 1 0 1 1 0-2h2.1a5.023 5.023 0 0 0 0 2zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" fill-rule="evenodd"></path></svg>
                    </span>
                    <span class="icon dark-icon">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg DarkModeIcon-svg SVG--color-svg" style="width: 12px;height: 12px;" viewBox="0 0 17 16" xmlns="http://www.w3.org/2000/svg"><path d="M7.914 0a6.874 6.874 0 0 0-1.26 3.972c0 3.875 3.213 7.017 7.178 7.017.943 0 1.843-.178 2.668-.5C15.423 13.688 12.34 16 8.704 16 4.174 16 .5 12.41.5 7.982.5 3.814 3.754.389 7.914 0z" fill-rule="evenodd"></path></svg>
                    </span>
                </span>
                <span class="bar"></span>
            </span>
        </div>
    </div>
    <div class="pr-3">
        <button class="btn btn-secondary sidebar-search">
            <div class="SVGInline SVGInline--cleaned SVG Icon Icon--search SearchIcon SVG--color SVG--color--gray200 Box-root Flex-flex">
                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--search-svg SearchIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12.6 11.2c.037.028.073.059.107.093l3 3a1 1 0 1 1-1.414 1.414l-3-3a1.009 1.009 0 0 1-.093-.107 7 7 0 1 1 1.4-1.4zM7 12A5 5 0 1 0 7 2a5 5 0 0 0 0 10z" fill-rule="evenodd"></path></svg>
            </div>
            <span class="ml-2">Find anything</span>
            <span class="ml-auto">/</span>
        </button>
    </div>
    <div class="pr-3 mt-2">
        <button type="button" class="btn btn-secondary sidebar-menu-toggle">Menu</button>
    </div>
    <div class="menu-scroll">
        <ul class="main-menu">
            <li>
                <a href="{{ route('home') }}" class="menu-item {{ $current === 'home' ? 'current' : '' }}">Introduction</a>
            </li>
            @foreach ($reference->guides() as $guide)
                <li>
                    <a href="{{ route('guide', $guide['slug']) }}" class="menu-item {{ $current === 'guide/'.$guide['slug'] ? 'current' : '' }}">{{ $guide['title'] }}</a>
                </li>
            @endforeach
        </ul>

        @foreach (['customer' => 'Customer API', 'admin' => 'Admin API'] as $audience => $groupName)
            <div class="sidebar-group">
                <h4 class="group-head d-flex align-items-center">
                    <span>{{ $groupName }}</span>
                    <span class="ml-auto mr-2 anchor">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--chevronDown-svg Chevron-svg Chevron-up-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M13.591 5.293a1 1 0 0 1 1.416 1.416l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 5.293L8 10.884z" fill-rule="evenodd"></path></svg>
                    </span>
                </h4>
                <ul class="main-menu mt-0">
                    @foreach ($reference->sections($audience) as $menuSection)
                        <li class="parent {{ $currentSection === $menuSection['slug'] ? 'open' : '' }}">
                            <a href="{{ route('section', $menuSection['slug']) }}" class="menu-item {{ $current === $menuSection['slug'] ? 'current' : '' }}">{{ $menuSection['name'] }}</a>
                            <div>
                                <ul>
                                    @foreach ($menuSection['operations'] as $menuOperation)
                                        <li>
                                            <a href="{{ route('operation', [$menuSection['slug'], $menuOperation['slug']]) }}" class="menu-item {{ $current === $menuSection['slug'].'/'.$menuOperation['slug'] ? 'current' : '' }}">{{ $menuOperation['summary'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

<div class="popup" style="display: none">
    <div class="popup-overlay"></div>
    <div class="popup-content">
        <div class="search-container">
            <div class="search-icon">
                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--search-svg SearchIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M12.6 11.2c.037.028.073.059.107.093l3 3a1 1 0 1 1-1.414 1.414l-3-3a1.009 1.009 0 0 1-.093-.107 7 7 0 1 1 1.4-1.4zM7 12A5 5 0 1 0 7 2a5 5 0 0 0 0 10z" fill-rule="evenodd"></path></svg>
            </div>
            <input class="search-input" type="text" placeholder="Go to..." />
        </div>
        <div class="popup-result">
            <div class="result-title">SEARCH RESULT</div>
            <div class="result-rows">
                {{-- <a href="#mail_lists" class="result-row row-focuxs">
                    <div class="result-content">
                        <label class="">Customers <span class="text-muted"> —  Connect</span></label>
                        <p class="desc"> objects allow you to perform recurring charges, and to track
                            multiple charges, that are associated with the same customer. The API allows
                            you to create, delete, and update your customers. You can retrieve individual
                            customers as well as a list of all your customers.
                            
                            Related guide: </p>
                    </div>
                    <div class="enter-icon">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--refund-svg InternalLinkIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 5a5 5 0 0 1 0 10 1 1 0 0 1 0-2 3 3 0 0 0 0-6l-6.586-.007L6.45 9.528a1 1 0 0 1-1.414 1.414L.793 6.7a.997.997 0 0 1 0-1.414l4.243-4.243A1 1 0 0 1 6.45 2.457L3.914 4.993z" fill-rule="evenodd"></path></svg>
                    </div>
                </a>
                <a href="#subscribers" class="result-row">
                    <div class="result-content">
                        <label class="">Customers</label>
                        <p class="desc"> objects allow you to perform recurring charges, and to track
                            multiple charges, that are associated with the same customer. The API allows
                            you to create, delete, and update your customers. You can retrieve individual
                            customers as well as a list of all your customers.
                            
                            Related guide: </p>
                    </div>
                    <div class="enter-icon">
                        <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--refund-svg InternalLinkIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 5a5 5 0 0 1 0 10 1 1 0 0 1 0-2 3 3 0 0 0 0-6l-6.586-.007L6.45 9.528a1 1 0 0 1-1.414 1.414L.793 6.7a.997.997 0 0 1 0-1.414l4.243-4.243A1 1 0 0 1 6.45 2.457L3.914 4.993z" fill-rule="evenodd"></path></svg>
                    </div>
                </a> --}}
            </div>
        </div>
        <div class="popup-footer">
            <span>
                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowUp-svg SVG--color-svg SVG--color--gray400-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 3.417V15a1 1 0 0 1-2 0V3.417L2.409 8.008A1 1 0 0 1 .993 6.593l6.3-6.3a1 1 0 0 1 1.414 0l6.3 6.3a1 1 0 0 1-1.416 1.415z" fill-rule="evenodd"></path></svg>
            </span>
            <span>
                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowDown-svg SVG--color-svg SVG--color--gray400-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M9 12.583l4.591-4.591a1 1 0 0 1 1.416 1.415l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 7.992L7 12.583V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg>
            </span>
            <span class="mr-3">Navigation</span>
            <span class="enter-icon">
                <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--refund-svg InternalLinkIcon-svg SVG--color-svg SVG--color--gray400-svg" style="width: 10px;height: 10px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 5a5 5 0 0 1 0 10 1 1 0 0 1 0-2 3 3 0 0 0 0-6l-6.586-.007L6.45 9.528a1 1 0 0 1-1.414 1.414L.793 6.7a.997.997 0 0 1 0-1.414l4.243-4.243A1 1 0 0 1 6.45 2.457L3.914 4.993z" fill-rule="evenodd"></path></svg>
            </span>
            <span>Go</span>
        </div>
    </div>
</div>

<script>
    // Bring the current page's menu item into view.
    $(document).ready(function () {
        var current = $('.main-menu a.menu-item.current');
        if (current.length) {
            current[0].scrollIntoView({block: 'center'});
        }
    });

    function escapeHtml(text) {
        return $('<div>').text(text).html();
    }

    class Search {
        constructor(selector) {
            var search = this;
            this.popup = selector;

            this.load(function() {
                search.focus();
            });
        }

        keyword() {
            return this.popup.find('.search-container input').val();
        }

        load(callback) {
            var search = this;
            var url = '{{ action("App\Http\Controllers\Docs\ApiController@lookup") }}';
            var keyword = this.keyword();

            if (!search.popup.find('.result-rows .loading').length) {
                search.popup.find('.result-rows').html('<span class="loading"><img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/Refresh_icon.svg" /><span>searching...</span></span>');
            }

            if(search.xhr && search.xhr.readyState != 4){
                search.xhr.abort();
            }
            search.xhr = $.ajax({
                method: "GET",
                url: url,
                data: {
                    keyword: keyword
                }
            })
            .done(function( data ) {
                search.popup.find('.result-rows').html('');
                data.forEach(function(item) {
                    search.popup.find('.result-rows').append(`<a href="`+escapeHtml(item.link)+`" class="result-row">
                        <div class="result-content">
                            <label class="">`+escapeHtml(item.title)+` <span class="text-muted"> —  `+escapeHtml(item.cat)+`</span></label>
                            <p class="desc">`+escapeHtml(item.desc)+`</p>
                        </div>
                        <div class="enter-icon">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--refund-svg InternalLinkIcon-svg SVG--color-svg SVG--color--gray200-svg" style="width: 12px;height: 12px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 5a5 5 0 0 1 0 10 1 1 0 0 1 0-2 3 3 0 0 0 0-6l-6.586-.007L6.45 9.528a1 1 0 0 1-1.414 1.414L.793 6.7a.997.997 0 0 1 0-1.414l4.243-4.243A1 1 0 0 1 6.45 2.457L3.914 4.993z" fill-rule="evenodd"></path></svg>
                        </div>
                    </a>`);

                    search.popup.find('a.result-row').on('click', function() {
                        search.hide();
                    });

                    search.popup.find('a.result-row').on('mouseenter', function() {
                        search.focus($(this));
                    });

                    if (callback != null) {
                        callback();
                    }
                });
            });
        }

        focus(item) {
            if (item == null) {
                item = this.popup.find('.result-rows .result-row').first();
            }

            if (item.length) {
                this.popup.find('.result-rows .result-row').removeClass('row-focus');
                item.addClass('row-focus');
            }
        }

        show() {
            this.popup.fadeIn();
            this.popup.find('.search-container input').focus();
        }

        hide() {
            this.popup.fadeOut();
        }

        moveUp() {
            if (!this.popup.find('.result-rows .result-row').length) {
                return;
            }

            var current = this.popup.find('.result-rows .result-row.row-focus');
            // has current item
            if (current.length) {
                // find prev item
                if(current.prev().length) {
                    current.removeClass('row-focus');
                    current.prev().addClass('row-focus');
                } else {
                    // do nothing
                }
            } else {
                this.focus();
            }
        }

        go() {
            if (this.popup.find('.result-rows .result-row.row-focus').length) {
                var href = this.popup.find('.result-rows .result-row.row-focus').attr('href');
                window.location.href = href;
                this.hide();
            }
        }

        moveDown() {
            if (!this.popup.find('.result-rows .result-row').length) {
                return;
            }

            var current = this.popup.find('.result-rows .result-row.row-focus');
            // has current item
            if (current.length) {
                // find next item
                if(current.next().length) {
                    current.removeClass('row-focus');
                    current.next().addClass('row-focus');
                } else {
                    // do nothing
                }
            } else {
                this.focus();
            }
        }
    }

    var search = new Search($('.popup'));

    $('.sidebar-search').on('click', function() {
        search.show();
    });

    $('.popup-overlay').on('click', function() {
        search.hide();
    });

    $('.search-container input').on('keyup', function(e) {
        if (e.which == 38) {    

        } else if (e.which == 40) {    

        } else if (e.which == 13) {

        } else {
            search.load(function() {
                search.focus();
            });
        }
    });

    $(document).on('keyup', function(e) {
        if (e.which == 38) {    
            search.moveUp();
        } else if (e.which == 40) {    
            search.moveDown();
        } else if (e.which == 13) {
            search.go();
        }
    });

</script>
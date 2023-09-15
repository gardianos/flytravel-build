<!doctype html>

<html>

<head>
    <title>Fly Travel</title>
    
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css' />
    <link href="{{asset('website/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/font-awesome-4.4.0/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/jquery-ui-1.10.4.custom.min.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/animate.css" rel="stylesheet')}} " type="text/css" />
    <link href="{{asset('website/css/settings_slide2.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/travel-mega-menu.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/jquery.bxslider.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/layout2.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/responsive.css')}} " rel="stylesheet" type="text/css" />
    <!--List-->
    <link href="{{asset('website/css/list/component.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
    <!-- Google Map api -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script>
    <link href="{{asset('website/css/flexslider.css')}} " rel="stylesheet" type="text/css" />
    <!--Carousel-->
    <link href="{{asset('website/css/carousel/component.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('website/css/gallery/component.css')}} " rel="stylesheet" type="text/css" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>

</head>

<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <section class='section-top-header'>
        <div class='top-header'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class='top-contact'><i class="fa fa-phone"></i><span>+38163 7378609</span><i class="fa fa-envelope"></i><span>info@flyskytravel.net</span></div>
                        <div class="top-login">
                            <div class="header-lang1">
                              <a href="#"><i class="fa fa-money" aria-hidden="true">&nbsp;@lang('strings.currency')</i></a>
                                @if(session('currency') == 'EUR')
                                <div><a href="#"><i class="fa fa-eur" aria-hidden="true"></i></a></div>
                                @endif
                                @if(session('currency') == 'USD')
                                <div><a href="#"><i class="fa fa-USD" aria-hidden="true"></i></a></div>
                                @endif
                                <div class="langs-drop1">
                                    <div><a href="{{ route('set_currency', 'USD') }}" class="langs-item">USD</a></div>
                                    <div><a href="{{ route('set_currency', 'EUR') }}" class="langs-item">EUR</a></div>
                                    <div><a href="{{ route('set_currency', 'RSD') }}" class="langs-item">RSD</a></div>
                                </div>
                            </div>
                            <div class="header-lang">
                                <a href="#">&nbsp;<img alt="" src="{{ asset('website/images/flags/en.gif') }}" /></a>
                                <div class="langs-drop">
                                    <div><a href="{{ route('set_locale', 'en') }}" class="langs-item">English</a></div>
                                    <div><a href="{{ route('set_locale', 'sq') }}" class="langs-item">Shqip</a></div>
                                    <div><a href="{{ route('set_locale', 'sr') }}" class="langs-item">Srpski</a></div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check())
                            <div class='top-login'>
                                <a href="{{ route('profile') }}" style="margin-right: 15px;">@lang('strings.profile')</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    @lang('strings.logout')
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class='top-login'>
                                <i class="fa fa-plus"></i>
                                <a class='reg-top' href="{{ route('register') }}">@lang('strings.register')</a>
                                <i class="fa fa-lock"></i><a href="{{ route('login') }}">@lang('strings.login')</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="top-mega-menu">
            <div class="container">
                <ul class="travel-mega-menu travel-mega-menu-anim-scale travel-mega-menu-response-to-icons">
                    <li class="line-logo">
                        <a class="logo" href="{{ route('index') }}"><img style="width:210px" src="{{ asset('flytravel-logo-menu.png') }} "
                                alt="" /></a>
                    <li>
                        <a class="top-menu-txt" href="{{ route('index') }}">@lang('strings.homepage')</a>
                    </li>
                    <li class="weather">
                        <a class="top-menu-txt" href="{{ url('contact') }}"><i class="fa fa-phone"></i>@lang('strings.contact')</a>
                        <div class="grid-container3 blue-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="weather">
                       <i class="fa fa-arrow-left" style="color:#25292c;" aria-hidden="true"></i> <span style="color:#25292c;"><b>@lang('strings.Contact us if you dont have results')</b></span>
                    </li>
                </ul>
            </div>
            <nav id="mobile-menu-01" class="mobile-menu">
                <div class="line-logo">
                    <a class="logo" href="{{ route('index') }}"><img src="{{ asset('flytravel-logo-menu.png') }}  "
                            alt="" /></a><i class="fa fa-bars"></i>
                </div>
                <div class="clear"></div>
                <ul class="travel-mega-menu-mobile">
                    <li class="line-mini-menu k-opn">
                        <a class="top-menu-txt" href="{{ route('index') }}">@lang('strings.homepage')</a>
                    </li>
                    <li class="line-mini-menu k-opn">
                        <a class="top-menu-txt" href="{{url('contact')}}"><i class="fa fa-phone"></i>@lang('strings.contact')</a>
                        <div class="grid-container3 collapse blue-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

        </div>
    </section>

    @yield('content')

    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <img style="width:120px" class='logo-footer' src="{{asset('flytravel-logo-white-footer.png')}} " alt='logo' />
                        <p>@lang('strings.travel_agency')</p>
                    </div>
                    <div class="col-md-3 footer-zone">
                        <h3>@lang('strings.contact')</h3>
                        <p><i class="fa fa-map-marker"></i>@lang('strings.address'): Vojvode Stepe Stepanovica, nr.5 / 17520 Bujanovac,
                            Serbia</p>
                        <p><i class="fa fa-phone"></i>Tel: 017 653255 | +38163 7378609</p>
                        <p><i class="fa fa-envelope-o"></i>Email: contact@flyskytravel.net</p>
                        <p><i class="fa fa-envelope-o"></i>Email: info@flyskytravel.net</p>
                        <div class="socialfooter">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <h3>NEWSLETTER</h3>
                    <!--start form-->
                    <form action="{{ route('newsletter.subscribe') }}" method="get" id="newsletter-form" class="newsletterfooter">
                        <input type="text" name="email"/>
                        <input type="submit">
                        <i class="fa fa-angle-right" onclick="subscribeToNewsletter()"></i>
                    </form>
                  </div>
                  <div class="col-md-3">
                     <a href="https://itunes.apple.com/us/app/fly-travel-017/id1453872041?mt=8"><img src=" {{asset('website/images/Buy-Buttons.png')}} "></a>
                     <br>
                     <br>
                    <a href="https://play.google.com/store/apps/details?id=flytravel.katrori.net.flytravel"><img src=" {{asset('website/images/Buy-Buttons copy.png')}} "></a>
                  </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-xs-6 copyright">FLYTRAVEL © 2019 @lang('strings.all_rights_reserved') </div>
                        <div class="col-xs-6 payment-card">
                        <i class="fa fa-2x fa-cc-visa"></i>
                        <i class="fa fa-2x fa-cc-mastercard"></i>
                        <i class="fa fa-2x fa-cc-amex"></i>
                        <i class="fa fa-2x fa-cc-paypal"></i>
                        <img src="{{asset('website/images/349310.png')}}" style="margin-left: 5px;margin-top: -12px;border-radius: 3px;">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('website/js/modernizr.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/jquery-1.10.1.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/jquery-migrate-1.2.1.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/jquery-ui-1.10.4.custom.min.js')}} " type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
    <script src="{{asset('website/js/jquery.easing.1.3.js')}} "></script>
    <!-- waypoint -->
    <script type="text/javascript" src="{{asset('website/js/waypoints.min.js')}} "></script>
    <script src="{{asset('website/js/jquery.themepunch.plugins.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/jquery.themepunch.revolution.min.js')}} " type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('website/js/bootstrap.min.js')}} "></script>
    <script src="{{asset('website/js/bootstrap-hover-dropdown.min.js')}} " type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <!--bxSlider-->
    <script src="{{asset('website/js/jquery.bxslider.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/list/jquery.mixitup.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/script.js')}} " type="text/javascript"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!--List-->
    <script src="{{asset('website/js/list/cbpViewModeSwitch.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/list/classie.js')}} " type="text/javascript"></script>
    <!--Carousel-->
    <script src="{{asset('website/js/carousel/modernizr.custom.js')}} " type="text/javascript"></script>
    <script src="{{asset('website/js/carousel/jquery.cbpContentSlider.min.js')}} " type="text/javascript"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="{{asset('website/js/jquery.accordion.js')}} " type="text/javascript"></script>
    <script type="text/javascript">
        var tpj = jQuery;
        tpj(document).ready(function () {
            "use strict";
            if (tpj.fn.cssOriginal !== undefined)
                tpj.fn.css = tpj.fn.cssOriginal;
            tpj('.fullwidthbanner').revolution({
                delay: 9000,
                startwidth: 1170,
                startheight: 646,
                onHoverStop: "on",
                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 4,
                hideThumbs: 200,
                navigationType: 'none',
                navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
                navigationStyle: "large",
                touchenabled: "on",
                navOffsetHorizontal: 0,
                navOffsetVertical: 20,
                fullWidth: "on",
                shadow: 0
            });
        });
    </script>
    <script>
        $(function () {
            "use strict";
            $('#cbp-contentslider').cbpContentSlider();
        });

        @if(Session::has('success'))
            alertify.success('{{ Session::get("success") }}');
        @endif
        @if(Session::has('error'))
            alertify.error('{{ Session::get("error") }}');
        @endif

        function subscribeToNewsletter() {
            var email = $('#newsletter-form').find('input[name=email]');
            if(email.val() == ''){
                return;
            } else {
                $('#newsletter-form').submit();
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('.accordion').accordion({
                defaultOpen: 'some_id'
            }); //some_id section1 in demo
        });

    </script>
    <script>
        $(function () {
            "use strict";
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [75, 300],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });

    </script>
    <script>
        $(function () {
            "use strict";
            // Clickable Dropdown
            $('.click-nav > ul').toggleClass('no-js js');
            $('.click-nav .js ul').hide();
            $('.click-nav .js').click(function (e) {
                $('.click-nav .js ul').slideToggle(200);
                $('.clicker').toggleClass('active');
                e.stopPropagation();
            });
            $(document).click(function () {
                if ($('.click-nav .js ul').is(':visible')) {
                    $('.click-nav .js ul', this).slideUp();
                    $('.clicker').removeClass('active');
                }
            });

            $('.click-nav-location > ul').toggleClass('no-js js');
            $('.click-nav-location .js ul').hide();
            $('.click-nav-location .js').click(function (e) {
                $('.click-nav-location .js ul').slideToggle(200);
                $('.clicker').toggleClass('active');
                e.stopPropagation();
            });
            $(document).click(function () {
                if ($('.click-nav-location .js ul').is(':visible')) {
                    $('.click-nav-location .js ul', this).slideUp();
                    $('.clicker').removeClass('active');
                }
            });
        });
    </script>
</body>
</html>

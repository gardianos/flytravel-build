@extends('layouts.website')

@section('content')

<section class="top-content">
    <div class="container-slider removeslide">
        <div class="container-reservation inside-slider">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Reservation form -->
                        <section id="reservation-form" class="reservation-color-form pos-inside-slide">
                            <div class="container-form-chose">
                                <div class="col-md-12">
                                    <!--********************* Hotel reservation ********************-->
                                    <div class="reservation-tabs">
                                        <div id="message"></div>
                                        <div class="row">
                                            <ul class="nav nav-tabs search-opt">
                                                <li class="active"><a href="#flights-tab" data-toggle="tab">@lang('strings.search_flights')</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <!--********************* Flight reservation ********************-->
                                        <form action="{{ route('search.tickets', App::getLocale()) }}" id="flights-tab"
                                            class="tab-pane form-inline reservation-flight active" method="get" name="reservationform">
                                            <div class="row">
                                                <div class="col-sm-6 child">
                                                    <div class="form-group">
                                                        <div class="guests-select">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="radio-inline"><input type="radio"
                                                                            name="type" id="oneway" value="oneway"
                                                                            checked>@lang('strings.one_way')</label>
                                                                    <label class="radio-inline"><input type="radio"
                                                                            name="type" value="return" id="return">@lang('strings.round_trip')</label>
                                                                    <label class="checkbox-inline" style="margin-left:10px"><input type="checkbox"
                                                                            name="nonStop" value="true" id="return">@lang('strings.direct_flights')</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 flight-where">
                                                    <div class="form-group">
                                                        <label for="destination1">@lang('strings.departure_place')</label>
                                                        <input type="search" class="form-control" id="leaving" name="origin"
                                                            autocomplete="off">
                                                        <br>
                                                        <label for="destination1">@lang('strings.arrival_place')</label>
                                                        <input type="text" class="form-control" id="going" name="destination"
                                                            autocomplete="off">
                                                        <span id="goingSpan"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 fly-check">
                                                    <div class="form-group">
                                                        <label for="checkin">@lang('strings.departure_date')</label>
                                                        <div class="content-checkin-data">
                                                            <input name="departureDate" type="text" id="checkinflight"
                                                                value="" class="form-control checkin" class="required" /><span
                                                                id="departureDateSpan"></span>
                                                        </div>

                                                        <div class="check-out">
                                                            <label for="checkout">@lang('strings.return_date')</label>
                                                            <div class="content-checkin-data">
                                                                <input name="returnDate" type="text" id="checkoutflight"
                                                                    value="" class="form-control checkout" class="required" /><span
                                                                    id="returnDateSpan"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 fly-who">
                                                    <div class="col-sm-4 adultfly">
                                                        <div class="form-group">
                                                            <div class="guests-select">
                                                                <label>@lang('strings.adult')</label>
                                                                <!--<i class="fa fa-user infield"></i>-->
                                                                <div class="popover-icon" data-container="body"
                                                                    data-toggle="popover" data-trigger="hover"
                                                                    data-placement="right" data-content="@lang('strings.16+_years')">
                                                                    <i class="fa fa-info-circle fa-lg"> </i> </div>
                                                                <select name="adults" id="Select2" class="form-control">
                                                                    <option selected="selected">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 child md-ch">
                                                        <div class="form-group">
                                                            <div class="guests-select">
                                                                <label>@lang('strings.child')</label>
                                                                <div class="popover-icon" data-container="body"
                                                                    data-toggle="popover" data-trigger="hover"
                                                                    data-placement="right" data-content="@lang('strings.2-16_years')">
                                                                    <i class="fa fa-info-circle fa-lg"> </i> </div>
                                                                <select name="children" id="Select3" class="form-control">
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 child">
                                                        <div class="form-group">
                                                            <div class="guests-select">
                                                                <label>@lang('strings.infant')</label>
                                                                <div class="popover-icon" data-container="body"
                                                                    data-toggle="popover" data-trigger="hover"
                                                                    data-placement="right" data-content="@lang('strings.under_2_years')">
                                                                    <i class="fa fa-info-circle fa-lg"> </i> </div>
                                                                <select name="infants" id="Select1" class="form-control">
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 colbtn">
                                                    <button type="submit" class="btn btn-primary btn-block search-btn">@lang('strings.search')</button>
                                                </div>
                                                <p class="errors" style="color: blue;"></p>
                                            </div>
                                            <input type="hidden" name="currency" value="{{ session('currency') }}">
                                        </form>
                                    </div>
                                    <!--Close tab-content form-->
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-page removeslide">
            <!-- SLIDER -->
            <div class="fullwidthbanner-container">
                <div class="fullwidthbanner">
                    <ul>
                        <!-- FADE -->
                        <li data-transition="fade" data-slotamount="10" data-thumb="">
                            <img src="{{asset('website/images/textsand.jpg')}} " alt="" />
                        </li>
                        <!-- SLIDEUP -->
                        <li data-transition="slideup" data-slotamount="7" data-thumb="">
                            <img src=" {{asset('website/images/travel-bg2.jpg')}} " alt="" />
                        </li>
                        <!-- SLIDEDOWN -->
                        <li data-transition="slidedown" data-slotamount="7" data-thumb="">
                            <img src="{{asset('website/img/thumb/20.png')}}" alt="" />
                        </li>
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
            <!-- SLIDER END -->
        </div>
    </div>
</section>
<!-- TOP OFFERTS -->


<section id="parallax_slide">
    <div class="effect-over">
        <div class="bx-about2 oxy-tmp">
            <ul class="bxslider">
                <li>
                    <img src=" {{asset('website/images/dubai.jpg')}} " alt="" />
                    <div class="cover-slide-trip"></div>

                </li>
                <li>
                    <img src="{{asset('website/images/paris.jpg')}}" alt="" />
                    <div class="cover-slide-trip"></div>

                </li>
                <li>
                    <img src="{{asset('website/images/london.jpg')}}" alt="" />
                    <div class="cover-slide-trip"></div>

                </li>
                <li>
                    <img src="{{asset('website/images/prague.jpg')}}" alt="" />
                    <div class="cover-slide-trip"></div>

                </li>
            </ul>
        </div>
        <!--Close col-md-12-->
    </div>
</section>

<section id="parallax-footer" class="price-color-log">
    <div class="effect-over">

    </div>
</section>


<!--Banner Last Minute-->

<section class='last-minute-banner bb-blue'>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class='col-sm-9 col-md-9'>
                    <h1 class="l-main-banner-title">Last Minute Offer! <span>Hurry Up!</span></h1>
                    <p class="l-main2-banner-title">Contact Fly Travel to have every information about trip!</p>
                </div>

            </div>
        </div>
    </div>
</section>

@stop

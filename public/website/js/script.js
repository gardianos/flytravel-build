$(document).ready(function ($) {
    "use strict";
    try {
        var myTimer = 0;
        clearTimeout(myTimer);
        myTimer = setTimeout(function () {
            $("#loader-wrapper").slideUp()
        }, 2000);
    } catch (err) {}
});

(function ($) {

    "use strict";

    $(document).ready(function () {

        // Reservation Form	
        //jQueryUI - Datepicker

        if (jQuery().datepicker) {
            jQuery('.checkin').datepicker({
                showAnim: "drop",
                dateFormat: "yy-mm-dd",
                minDate: "-0D",
            });

            jQuery('.checkout').datepicker({
                showAnim: "drop",
                dateFormat: "yy-mm-dd",
                minDate: "-0D",
                beforeShow: function () {
                    var a = jQuery(".checkin").datepicker('getDate');
                    if (a) return {
                        minDate: a
                    }
                }
            });
            jQuery('.checkin, .checkout').on('focus', function () {
                jQuery(this).blur();
            }); // Remove virtual keyboard on touch devices
        }
        jQuery('[data-toggle="popover"]').popover();



        var mobile_nav = $("#mobile-menu-01 li.line-mini-menu");
        mobile_nav.on("click", function () {
            $(this).children('div').addClass("active");
            $(this).children('div').toggle(1000);
        });

        var mobile_open = $("#mobile-menu-01 .line-logo i.fa-bars");
        mobile_open.on("click", function () {
            $("#mobile-menu-01 .travel-mega-menu-mobile").toggle(1000);
        });

        $('.header-lang').hover(
            function () {
                $('.langs-drop').fadeIn();
            },
            function () {
                $('.langs-drop').hide();
            }
        );

        $('.header-lang1').hover(
            function () {
                $('.langs-drop1').fadeIn();
            },
            function () {
                $('.langs-drop1').hide();
            }
        );

        $(function () {
            "use strict";
            $('#Grid').mixItUp();
        });

        $('#cbp-contentslider').cbpContentSlider();

        /**************  Animated Form Login  ************************/

        $('.top-login a.frm-clk').click(function () {
            $('.login-page').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
        $('.close-frm-login i').click(function () {
            $('.login-page').animate({
                display: "none",
                opacity: "toggle"
            }, "slow");
        });
        $('.message a').click(function () {
            $('.login-page form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });

        


        /**************  Animated images up  ************************/

        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").on("click", function (e) {
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").on("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function () {
                    $(this).addClass("hover");
                })
                // handle the mouseleave functionality
                .mouseleave(function () {
                    $(this).removeClass("hover");
                });
        }


        /**************  Animated Hover Price Circle  ************************/


        $('.price-color-log .content-red').on("hover", function () {
            $('.price-color-log .content-green').addClass('circle-opacity');
        }, function () {
            $('.price-color-log .content-green').removeClass('circle-opacity');
        });

        $('.price-color-log .content-blue').on("hover", function () {
            $('.price-color-log .content-green').addClass('circle-opacity');
        }, function () {
            $('.price-color-log .content-green').removeClass('circle-opacity');
        });


        /**************  Animated Counter  ************************/


        var nav = $('.top-mega-menu');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                nav.addClass("push-top");
            } else {
                nav.removeClass("push-top");
            }
        });

        try {
            /* ================ ANIMATED CONTENT ================ */
            if ($(".animated")[0]) {
                $('.animated').css('opacity', '0');
            }

            $('.triggerAnimation').waypoint(function () {
                var animation = $(this).attr('data-animate');
                $(this).css('opacity', '');
                $(this).addClass("animated " + animation);

            }, {
                offset: '80%',
                triggerOnce: true
            });
        } catch (err) {

        }



        /********************************************
            CONTACT
        ********************************************/

        $('#contact_form').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var name = $("#name").val();
            var email = $("#email").val();
            var text = $("#message").val();
            var dataString = 'name=' + name + '&email=' + email + '&message=' + text;

            function isValidEmail(emailAddress) {
                var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                return pattern.test(emailAddress);
            };
            if (isValidEmail(email) && (text.length > 20) && (name.length > 1)) {
                $.ajax({
                    type: 'POST',
                    url: "contact_form/contact_process.php",
                    data: dataString,
                    success: function () {
                        $('.success').fadeIn(1000);
                        $("#name").val("");
                        $("#email").val("");
                        $("#message").val("");
                    }
                });
            } else {
                $('.error').fadeIn(1000);
            }
        });



        /**************  List Trip checkbox management  ************************/


        $('.ac-container article div').on("click", function (e) {
            $(this).toggleClass('active');

        });


        /**************  Blog Right  ************************/

        $('.blog-category .cc-check').on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            e.stopPropagation();
        });

        $('.accordion').accordion({
            defaultOpen: 'some_id'
        }); //some_id section1 in demo

        /************** BoxSlider *******************/

        $('.bxslider').bxSlider({
            auto: true
        });



        /********************************************
            GOOGLE MAPS
            ********************************************/

        // using a DROP animation. Clicking on the marker will toggle
        // the animation between a BOUNCE animation and no animation.
        $(document).ready(function ($) {
            "use strict";
            var mapPosition = new google.maps.LatLng(-33.869931, 151.210824);
            var markerPosition = new google.maps.LatLng(-33.869931, 151.210824);
            var image = 'images/marker.png';
            var marker;
            var map;

            function initialize() {
                var styleArray = [{
                    featureType: 'all'

                }, {
                    featureType: 'road.arterial',
                    elementType: 'geometry'

                }];
                var mapOptions = {
                    zoom: 12,
                    styles: styleArray,
                    center: mapPosition
                };

                map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    icon: image,
                    position: markerPosition
                });
                google.maps.event.addListener(marker, 'click', toggleBounce);
            }

            function toggleBounce() {

                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        });


        //*** Validation Search Form Flights ***//

        // Waiting until DOM is ready
$().ready(function() {

    

            // Selecting the form and defining validation method
    $("#flights-tab").validate({


        // Passing the object with custom rules
        rules : {
            // login - is the name of an input in the form
            origin : {
              // Setting login to be required
              required : true,
              minlength : 3,
              maxlength: 3
             
            },
            destination : {
                required : true,
                minlength : 3,
                maxlength: 3
            
            },
            departureDate : {
                required : true
                
            },
            returnDate : {
                required : true
                
            }
        },
        // Setting error messages for the fields
        messages: {
            origin: {
                required:"",
                minlength:""
            },
            departureDate: {
                required: "",
            },
            destination: {
                required:"",
                minlength:""
            },
            returnDate :""
        },

        highlight: function (element) {
                $(element).parent().addClass('has-error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('has-error')
            },

        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }

        

    });



});



   //*** Validation Account Settings Form ***//

     
$().ready(function() {
    // Selecting the form and defining validation method
    $("#accountForm").validate({
        // Passing the object with custom rules
        rules : {
    
            old_password : {
           
              required : true,
             
            },
            new_password : {
                required : true,
                
            
            },
            new_password_confirmation : {
                required : true
                
            }
        },
        // Setting error messages for the fields
        messages: {
            old_password: "",
            new_password: {
                required: "",
            },
            new_password_confirmation :""
        },

        highlight: function (element) {
                $(element).parent().addClass('has-error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('has-error')
            },

        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }

        

    });
});

 //*** Validation Login Form ***//

   
$().ready(function() {
 
    $("#login-form").validate({
        // Passing the object with custom rules
        rules : {
            
            email : {
           
              required : true,
              email: true
            },
            password : {
                required : true,
                minlength: 5
            
            }
        },
        // Setting error messages for the fields
        messages: {
            email: {
                required:"",
                email:""
            },
            password: {
                required: "",
                minlength:""
            }
        },

        highlight: function (element) {
                $(element).parent().addClass('has-error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('has-error')
            },

        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }

        

    });
});

 //*** Validation Register Form ***//


$().ready(function() {

    $("#register-form").validate({
        // Passing the object with custom rules
        rules : {
            
            email : {
         
              required : true,
              email: true
            },
            password : {
                required : true,
                minlength: 5
            
            },
            name :{
                required : true,
                minlength : 2
            }
        },
        // Setting error messages for the fields
        messages: {
            email: {
                required:"",
                email:""
            },
            password: {
                required: "",
                minlength:""
            },
            password: {
                required: "",
                minlength:""
            },
            name :{
               required : "",
                minlength : ""
            }
        },

        highlight: function (element) {
                $(element).parent().addClass('has-error')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('has-error')
            },

        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }

        

    });
});

 //*** Validation Payment Form ***//


 var validator = $('#payment-form').validate({

    highlight: function (element) {
            $(element).parent().addClass('has-error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('has-error')
        },

    // Setting submit handler for the form
    submitHandler: function(form) {
        form.submit();
    }
 });
        
 if(validator != undefined) {
     $(".required").each(function() {
        $(this).rules("add", { 
            required:true,
            messages: {
               required: "",
             }
        });
     })
 }


            

    
        /***** Percentage code*****/


        $('.skillbar').each(function () {
            $(this).find('.skillbar-bar').width(0);
        });

        $('.skillbar').each(function () {
            $(this).find('.skillbar-bar').animate({
                width: $(this).attr('data-percent')
            }, 2000);
        });

        /**** Radio buttons ****/

        $("#checkoutflight").prop("disabled", true);

        $("#return").click(function () {
            $("#checkoutflight").prop("disabled", false);
            
        });

        $("#oneway").click(function () {
            $("#checkoutflight").prop("disabled", true);
        });

        /**** ticket detail ****/

        $(".outbound-flights-arrow").click(function() {
            $(".outbound-flights").toggleClass("hide");
        });

        $(".inbound-flights-arrow").click(function() {
            $(".inbound-flights").toggleClass("hide");
        });

        $('.search-btn').on('click', function() {
            if($('#flights-tab').valid()) {
                $('#loader-wrapper').css('display', 'block');
            }
        });

        $('.buy-btn').on('click', function() {
            $('#loader-wrapper').css('display', 'block');
        });

        $('.payment-btn').on('click', function() {
            if($('#payment-form').valid()) {
                $('#loader-wrapper').css('display', 'block');
            }
        });

        $('input[name="register"]').on('change', function() {
            if($(this).attr('value') == '0') {
                $('#ticket-password').addClass('hide');
            } else {
                $('#ticket-password').removeClass('hide');
            }
        });

        var access_token = '';

        $.ajax({
            url: "https://api.amadeus.com/v1/security/oauth2/token",
            method: 'post',
            data: {
                grant_type: 'client_credentials',
                client_id: "OljDCuIgNcFAAHxxvmLLzZrtmGrlnbPz",
                client_secret: 'OMqW4owYQVWilETC'
            },
            success: function (data) {
                access_token = data.access_token;
            }
        });

        $("#leaving").autocomplete({
            source: function (request, response) {
                if(access_token == ''){

                } else {
                    $.ajax({
                        url: "https://api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&view=LIGHT&keyword=" + request.term,
                        dataType: "json",
                        headers: {
                            "Authorization": "Bearer " + access_token
                        },
                        success: function (data) {
                            response($.map( data.data, function( item ) {
                                if(item.subType == 'AIRPORT'){
                                    return {
                                        label: item.address.cityName + ', ' + item.address.countryName + ' [' + item.iataCode + ']',
                                        value: item.iataCode
                                    }
                                }
                            }));
                        }
                    });
                }
            },
            minLength: 3,
            select: function (event, ui) {

            },
            open: function () {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });

        $("#going").autocomplete({
            source: function (request, response) {
                if(access_token == ''){

                } else {
                    $.ajax({
                        url: "https://api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&view=LIGHT&keyword=" + request.term,
                        dataType: "json",
                        headers: {
                            "Authorization": "Bearer " + access_token
                        },
                        success: function (data) {
                            response($.map( data.data, function( item ) {
                                if(item.subType == 'AIRPORT'){
                                    return {
                                        label: item.address.cityName + ', ' + item.address.countryName + ' [' + item.iataCode + ']',
                                        value: item.iataCode
                                    }
                                }
                            }));
                        }
                    });
                }
            },
            minLength: 3,
            select: function (event, ui) {

            },
            open: function () {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        
        

    });

})(window.jQuery);



    
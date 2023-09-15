 $(function() {
        $('#myTable').DataTable();
        $(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

$(function () {
    "use strict";
    $(function () {
        $(".preloader").fadeOut();
    });
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 55;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").addClass("ti-menu");
        }
        else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
         var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);
    // ============================================================== 
    // Theme options
    // ==============================================================     
    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
        else {
            $("body").trigger("resize");
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
        }
    });
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });
    // ============================================================== 
    // Right sidebar options
    // ============================================================== 
    $(".right-side-toggle").click(function () {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function (e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
    
    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function () {
         $('[data-toggle="popover"]').popover()
    })

        $(".outbound-flights-arrow").click(function() {
            $(".outbound-flights").toggleClass("hide");
        });

        $(".inbound-flights-arrow").click(function() {
            $(".inbound-flights").toggleClass("hide");
        });
       
    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    $('.scroll-sidebar, .right-side-panel, .message-center, .right-sidebar').perfectScrollbar();
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function () {
        $(this).toggleClass("task-done");
    });
    // ============================================================== 
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="collapse"] i').toggleClass('ti-minus ti-plus');
        $(this).closest('.card').children('.card-body').collapse('toggle');
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="expand"] i').toggleClass('mdi-arrow-expand mdi-arrow-compress');
        $(this).closest('.card').toggleClass('card-fullscreen');
    });
    // Close Card
    $('a[data-action="close"]').on('click', function () {
        $(this).closest('.card').removeClass().slideUp('fast');
    });
    // ============================================================== 
    // Color variation
    // ==============================================================
    
    var mySkins = [
        "skin-default",
        "skin-green",
        "skin-red",
        "skin-blue",
        "skin-purple",
        "skin-megna",
        "skin-default-dark",
        "skin-green-dark",
        "skin-red-dark",
        "skin-blue-dark",
        "skin-purple-dark",
        "skin-megna-dark"
    ]
        /**
         * Get a prestored setting
         *
         * @param String name Name of of the setting
         * @returns String The value of the setting | null
         */
    function get(name) {
        if (typeof (Storage) !== 'undefined') {
            return localStorage.getItem(name)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    /**
     * Store a new settings in the browser
     *
     * @param String name Name of the setting
     * @param String val Value of the setting
     * @returns void
     */
    function store(name, val) {
        if (typeof (Storage) !== 'undefined') {
            localStorage.setItem(name, val)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    
    /**
     * Replaces the old skin with the new skin
     * @param String cls the new skin class
     * @returns Boolean false to prevent link's default action
     */
    function changeSkin(cls) {
        $.each(mySkins, function (i) {
            $('body').removeClass(mySkins[i])
        })
        $('body').addClass(cls)
        store('skin', cls)
        return false
    }

    function setup() {
        var tmp = get('skin')
        if (tmp && $.inArray(tmp, mySkins)) changeSkin(tmp)
            // Add the change skin listener
        $('[data-skin]').on('click', function (e) {
            if ($(this).hasClass('knob')) return
            e.preventDefault()
            changeSkin($(this).data('skin'))
        })
    }
    setup()
    $("#themecolors").on("click", "a", function () {
        $("#themecolors li a").removeClass("working"), 
        $(this).addClass("working")
    })

    $('#return').click();

    $('input[type=radio][name=type]').change(function() {
        if($(this).val() == 'oneway') {
            $('#return_date').hide();
        } else {
            $('#return_date').show();
        }
    });

    function get_origin() {
        return 
    }

    function get_destination() {
        return 
    }

    function get_flights() {

    }

    if(window.location.href.substr(window.location.href.lastIndexOf('/') + 1).split('?')[0] === 'search') {

        var values = [], parameter;
        var parameters = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < parameters.length; i++) {
            parameter = parameters[i].split('=');
            values[parameter[0]] = parameter[1];
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        
        $.ajax({
            url: "search/flights",
            method: 'post',
            data: {
                type : values['type'],
                origin : values['origin'],
                destination : values['destination'],
                departure_date : values['departure_date'],
                return_date : values['return_date'],
                adults : values['adults'],
                children : values['children'],
                infants : values['infants']
            },
            success: function(result) {
                var origin_term = result.results[0].itineraries[0].outbound.flights[0].origin.airport;
                var destination_term = result.results[0].itineraries[0].outbound.flights[result.results[0].itineraries[0].outbound.flights.length - 1].destination.airport;
                $.when( 
                    $.ajax({ url: "search/airports", method: 'post', data: { term : origin_term } }), 
                    $.ajax({ url: "search/airports", method: 'post', data: { term : destination_term, } }) ).
                    done(function ( origin, destination ) {
                    $('.loader').remove();
                    for (let i = 0; i < result.results.length; i++) {
                        var card = $('<div class="card"></div>');
                        var card_body = $('<div class="card-body"></div>')
                        var row = $('<div class="row"></div>');
                        var col1 = $('<div class="col"></div>');
                        var col2 = $('<div class="col"></div>');
                        var col_text_center = $('<div class="col text-center"></div>');
                        var col_border = $('<div class="col"></div>').css('border-right', '1px solid black');
                        var button = $('<button class="btn btn-success">BOOK</button>');
                        card.append(card_body);
                        card_body.append(row);
                        row.append(col1);
                        row.append(col2);
                        row.append(col_border);
                        row.append(col_text_center);
                        col1.append('<h3>' + result.results[i].itineraries[0].outbound.flights[0].origin.airport + '</h3>');
                        col1.append('<small>' + origin[0] + '</small>');
                        col1.append('<h6>' + result.results[i].itineraries[0].outbound.flights[0].departs_at.split('T')[1] + '</h6>');
                        col2.append('<h5>' + result.results[i].itineraries[0].outbound.duration.split(':')[0] + 'h ' + result.results[i].itineraries[0].outbound.duration.split(':')[1] + 'm</h5>');
                        if(result.results[i].itineraries[0].outbound.flights.length > 1) {
                            if(result.results[i].itineraries[0].outbound.flights.length == 2) {
                                col2.append('<h6>1 stop</h6>');
                            } else {
                                col2.append('<h6>' + (result.results[i].itineraries[0].outbound.flights.length - 1) + ' stops</h6>');
                            }
                        }
                        col_border.append('<h3>' + result.results[i].itineraries[0].outbound.flights[result.results[i].itineraries[0].outbound.flights.length - 1].destination.airport + '</h3>');
                        col_border.append('<small>' + destination[0] + '</small>');
                        col_border.append('<h6>' + result.results[i].itineraries[0].outbound.flights[result.results[i].itineraries[0].outbound.flights.length - 1].arrives_at.split('T')[1] + '</h6>');
                        col_text_center.append('<h3>' + result.results[i].fare.total_price + '$' + '</h3>');
                        col_text_center.append(button);
                        card.appendTo('#flights');
                    }
                });
            },
            error: function(result) {
                console.log(result);
            }
        });

    }


    


});


{/* <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h3>
                    origin airport
                </h3>
                <h5>
                    depart time
                </h5>
            </div>
            <div class="col">
                <h5>
                    duration
                </h5>
                <h6>
                    stops
                </h6>
            </div>
            <div class="col" style="border-right: 1px solid black">
                <h3>
                    destination airport
                </h3>
                <h5>
                    arrive time
                </h5>
            </div>
            <div class="col text-center">
                <h3>
                    price
                </h3>
                <button class="btn btn-success">BOOK</button>
            </div>
        </div>
    </div>
</div> */}


    
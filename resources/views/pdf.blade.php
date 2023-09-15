<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href=" {{asset('main/dist/css/ticket.css')}} ">
    <!-- chartist CSS -->
    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}} " rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
     <!-- chartist CSS -->
    <link href="{{asset('assets/node_modules/chartist-js/dist/chartist.min.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/chartist-js/dist/chartist-init.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/css-chart/css-chart.css')}} " rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('main/dist/css/pages/widget-page.css')}} " rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('main/dist/css/style.min.css')}} " rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('main/dist/css/pages/timeline-vertical-horizontal.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/dashboard1.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/dashboard4.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('main/dist/css/pages/contact-app-page.css')}} " rel="stylesheet">
</head>

<body>
        
        <div class="container">

            <div class="row">
                <div class="col-md-6 well">
                      <div class="col-md-6"><img src="{{asset('flytravel-logo-menu11.png')}}" style="margin-left: 5px;margin-top: -12px;"> <span><strong class="float-right" style="margin-top: 10px;"><p><b>FlyTravel</b></p></strong></span> </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6 well">
                    <span> <strong>Total Price:</strong> <h4>{{ $ticket->price }} {{ $ticket->currency }}</h4> </span>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span><strong><b>Buyer</b></strong></span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 well">
                    <div class="col-md-6"> <strong class="float-right">{{ $ticket->name }}</strong></div>
                    <div class="col-md-6"><p>{{ $ticket->email }}</p></div>
                    <div class="col-md-6"><p>{{ $ticket->phone }}</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span><strong><b>Flight number</b></strong></span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 well">
                    <span> <h4>{{ $ticket->flight_number_outbound }}</h4> </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span><strong><b>Outbound</b></strong></span>
                </div>
            </div>

            @foreach($ticket->outbound_flights as $flight)
            <div class="row">
                <div class="col-md-6 well">
                    
                    <div class="col-md-6"><i class="fa fa-plane" aria-hidden="true"></i> <strong class="float-right">{{ $flight->carrier }}</strong></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport_iata }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_date }} , {{ $flight->departure_time }}</p></div>
                    <div class="col-md-6"><p><small>-</small></p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport_iata }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->arrival_date }} , {{ $flight->arrival_time }}</p></div>
                </div>
            </div>
            @endforeach

            @if($ticket->type == 'return')
            
            <div class="row">
                <div class="col-md-2">
                    <span><strong><b>Inbound</b></strong></span>
                </div>
            </div>
            @foreach($ticket->inbound_flights as $flight)
            <div class="row">
                <div class="col-md-6 well">
                    <div class="col-md-6"><i class="fa fa-plane" aria-hidden="true" style="-ms-transform: rotate(180deg);
                                                                                            -webkit-transform: rotate(180deg);
                                                                                            transform: rotate(180deg);">
                    </i> <strong class="float-right">{{ $flight->carrier }}</strong></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport_iata }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_date }} , {{ $flight->departure_time }}</p></div>
                    <div class="col-md-6"><p><small>-</small></p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->departure_airport_iata }}</p></div>
                    <div class="col-md-6"><p>{{ $flight->arrival_date }} , {{ $flight->arrival_time }}</p></div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="row">
                <div class="col-md-2">
                    <span><strong><b>Passengers</b></strong></span>
                </div>
            </div>
            @foreach($ticket->passengers as $key => $passenger)
            <div class="row">
                <div class="col-md-6 well">
                    <div class="col-md-6"><i class="fa fa-male" aria-hidden="true"></i> <strong class="float-right">Passenger: {{ $key + 1 }}</strong></div>
                    <div class="col-md-6"><p>{{ $passenger->first_name }}</p></div>
                    <div class="col-md-6"><p>{{ $passenger->last_name }}</p></div>
                    <div class="col-md-6"><p>{{ $passenger->gender }}</p></div>
                    <div class="col-md-6"><p>{{ $passenger->birthday }}</p></div>
                    <div class="col-md-6"><p>{{ $passenger->nationality }}</p></div>
                </div>
            </div>
            @endforeach
        </div>

        <h3 class="text-center">THANK YOU FOR FLYING WITH FLYTRAVEL</h3>

        <p>This ticket is for information purpouses only and cannot be used in any way or form in any airport, the real ticket will be sent to you as soon as possible.</p>







    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src= "{{asset('main/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('main/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('main/dist/js/sidebarmenu.js')}} "></script>
    <!--Custom JavaScript -->
    <script src="{{asset('main/dist/js/custom.min.js')}} "></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('assets/node_modules/raphael/raphael-min.js')}} "></script>
    <script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}} "></script>
    <script src="{{asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}} "></script>
    <script src="{{asset('main/dist/js/pages/morris-data.js')}} "></script>

    <!-- Chart JS -->
    <script src="{{asset('main/dist/js/dashboard1.js')}} "></script>
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>

     <!-- This is data table -->
    <script src="{{asset('assets/node_modules/datatables/datatables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <script src="{{asset('assets/node_modules/gauge/gauge.min.js')}} "></script>

    <script src="{{asset('main/dist/js/pages/widget-data.js')}} "></script>

    <script src="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}} "></script>

    <script src="{{asset('assets/node_modules/skycons/skycons.js')}}"></script>

    <script src="{{asset('main/dist/js/dashboard4.js')}}"></script>

    <script src="{{asset('main/dist/js/custom.js')}}"></script>

</body>

</html>
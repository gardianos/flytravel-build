<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Fly Travel</title>
    <link rel="stylesheet" href=" {{asset('main/dist/css/ticket.css')}} ">
    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/chartist-js/dist/chartist.min.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/chartist-js/dist/chartist-init.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/css-chart/css-chart.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/widget-page.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/style.min.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/timeline-vertical-horizontal.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/dashboard1.css')}} " rel="stylesheet">
    <link href="{{asset('main/dist/css/pages/dashboard4.css')}} " rel="stylesheet">
    <link href="{{asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}} " rel="stylesheet" type="text/css" />
     <link href="{{asset('main/dist/css/pages/contact-app-page.css')}} " rel="stylesheet">
</head>
<body class="wp-menu skin-blue-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">FLY TRAVEL</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" style="padding: 0px;">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <b>
                        </b>
                        <span>
                        <img src="{{ asset('assets/images/logo-text.png') }} " alt="homepage" class="dark-logo" />
                        <img src="{{ asset('website/images/flyTravel.jpg') }} " class="light-logo" alt="homepage" />
                        </span> </a>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a href="{{ route('dashboard') }}"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> 
                            <a href="{{ route('admin.ticket.index') }}"><i class="ti-email"></i>Tickets</a>
                        </li>
                        <li> 
                            <a href="{{ route('percentage.edit') }}"><i class="ti-money"></i>Percentage</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      
                        @yield('content')
                           
                    </div>
                </div>
                <div class="right-sidebar ps ps--theme_default" data-ps-id="db579a65-3b57-b221-d952-60b61818c02b">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme working">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
                <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
        </div>
        <footer class="footer">
        </footer>
    </div>
    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src= "{{asset('main/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('main/dist/js/waves.js')}}"></script>
    <script src="{{asset('main/dist/js/sidebarmenu.js')}} "></script>
    <script src="{{asset('main/dist/js/custom.min.js')}} "></script>
    <script src="{{asset('assets/node_modules/raphael/raphael-min.js')}} "></script>
    <script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}} "></script>
    <script src="{{asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}} "></script>
    <script src="{{asset('main/dist/js/pages/morris-data.js')}} "></script>
    <script src="{{asset('main/dist/js/dashboard1.js')}} "></script>
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('assets/node_modules/datatables/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{asset('assets/node_modules/gauge/gauge.min.js')}} "></script>
    <script src="{{asset('main/dist/js/pages/widget-data.js')}} "></script>
    <script src="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}} "></script>
    <script src="{{asset('assets/node_modules/skycons/skycons.js')}}"></script>
    <script src="{{asset('main/dist/js/dashboard4.js')}}"></script>
    <script src="{{asset('main/dist/js/custom.js')}}"></script>
    <script type="text/javascript">
        jQuery('.mydatepicker').datepicker();
    </script>
    <script>
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
    </script>
</body>
</html>
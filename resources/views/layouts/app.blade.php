<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2017 03:10:04 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/Team_liquid.ico')}}" />
    <link rel="icon" type="image/png" href="{{url('/assets/img/Team_liquid.ico')}}'" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MR by  Team Liquid</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{url('/assets/css/material-dashboard.css')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{url('/assets/css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{url('/assets/css/font-awesome.css')}}" rel="stylesheet">
    <!--     Fonts and icons     -->

    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/material-design-iconic-font.css')}}" />
    @yield('head')
</head>

<body >
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black"><!--data-image="{{url('/assets/img/sidebar-1.jpg')}}">-->
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <div class="logo">
            <a class="simple-text">
                Sistema RCI
            </a>
        </div>
        <div class="logo logo-mini">
            <a class="simple-text">
                SR
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <?php $vstr_titulo = 0; ?>
                @foreach($item as $i)
                    @if($i->idArea>0 && $vstr_titulo == 0)
                        <?php $vstr_titulo = 1; ?>
                        <li style="pointer-events: none;">
                            <div class="logo">
                                <a href="http://www.creative-tim.com/" class="simple-text">
                                    Menu Entidad
                                </a>
                            </div>
                            <div class="logo logo-mini">
                                <a href="http://www.creative-tim.com/" class="simple-text">
                                    ME
                                </a>
                            </div>

                        </li>
                    @endif
                    @if(count($i->list_SubAcesos)== 0)
                        <li @if($i->resaltado)class="active"@endif>
                            <a href="@if($i->idArea>0) {{url($i->url."/".$i->idArea)}} @else{{url($i->url)}}  @endif">
                                <i class="md {{$i->icono}} md-lg"></i>
                                <p>{{$i->nombre}}</p>
                            </a>
                        </li>
                    @else
                        <li>
                            <a data-toggle="collapse" href="#{{$i->id}}_AC2" aria-expanded="true">
                                <i class="md {{$i->icono}} md-lg"></i>
                                <p>{{$i->nombre}}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse @if($i->resaltado) in @endif" id="{{$i->id}}_AC2">
                                <ul class="nav">
                                    @foreach($i->list_SubAcesos as $r)
                                        <li @if($r->resaltado)class="active"@endif>
                                            <a href="@if($i->idArea>0) {{url($r->url."/".$i->idArea)}} @else{{url($r->url)}}  @endif">{{$r->nombre}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
    @yield('extra')
    <div class="main-panel pat-one-in-million">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular md md-more-vert md-2x"></i>
                        <i class="material-icons visible-on-sidebar-mini md md-view-list md-2x"></i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @yield('title')
                </div>
                <div class="collapse navbar-collapse">
                    <div class="navbar-form navbar-right" role="search" style="display: none;" id="btn-Search">
                        <div class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button class="btn btn-white btn-round btn-just-icon">
                            <i class="md md-search"></i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </div>

            </div>
        </nav>
        <div class="content" style="height: 90%;">
            <div class="container-fluid" style="height: 100%;">
                @yield('content')

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
            </div>
        </footer>

    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}" />
</body>
<!--   Core JS Files   -->
<script src="{{url('/assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{url('/assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{url('/assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{url('/assets/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{url('/assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{url('/assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{url('/assets/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{url('/assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{url('/assets/js/nouislider.min.js')}}"></script>
<!-- Select Plugin -->
<script src="{{url('/assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{url('/assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{url('/assets/js/sweetalert2.js')}}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{url('/assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{url('/assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{url('/assets/js/jquery.tagsinput.js')}}"></script>

<script src="{{url('/assets/js/jquery.nicescroll.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{url('/assets/js/material-dashboard.js')}}"></script>

<script type="text/javascript" src="{{url('/assets/plugin/highchart/js/highcharts.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/plugin/highchart/js/highcharts-more.js')}}"></script>
<!--<script type="text/javascript" src="{{url('/assets/plugin/highchart/js/themes/gray.js')}}"></script>-->
<script type="text/javascript" src="{{url('/assets/js/jquery.bootstrap-growl.min.js')}}"></script>



@yield('script')
</html>
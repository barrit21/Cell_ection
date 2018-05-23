<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>CELL'ECTION</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" href="/zontal-admin/css/bootstrap.css"/>
    <!-- FONT AWESOME ICONS  -->
    <link rel="stylesheet" href="/zontal-admin/css/font-awesome.css"/>
    <!-- CUSTOM STYLE  -->
    <link rel="stylesheet" href="/zontal-admin/css/style.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/bootstrap-editable.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/css/bootstrap-editable.css">

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{asset('zontal-admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/bootstrap-table-export.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/tableExport.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/bootstrap-table-filter-control.js')}}"></script>
    <script src="{{asset('js/bootstrap-table/jquery.base64.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119771968-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119771968-1');
</script>

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <span id="admin">
                        @if (! Auth::check())
                            <a href="/admin/login" @if ($menu == 'sign') class='menu-top-active' @endif><i class="glyphicon glyphicon-off" id="loginbutton"></i></a>
                        @endif
                    </span>
                    <span>
                        @if (Auth::check())
                            <a href="/admin/logout"><i class="glyphicon glyphicon-off" id="loginbutton"></i></a>
                        @endif
                    </span>
                    @if (Auth::check())
                        <div class="col-sm">
                            <a href="/admin/home" id="author-check">{{Auth::user()->name}}</a>
                        </div> 
                    @endif                       
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img class="img-responsive" src="/gif/logo.gif" />
                </a>               
            </div>

        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li>
                                <a href='/' @if ($menu == 'home') class='menu-top-active' @endif>
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href='/about_us' @if ($menu == 'about') class='menu-top-active' @endif>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="/contact_us" @if ($menu == 'contact') class='menu-top-active' @endif>Contact Us</a>
                            </li>                            
                            <li>
                                <a href='/data' @if ($menu == 'data') class='menu-top-active' @endif>
                                    Data
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    @yield('content')


    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
            <center>&copy; CELL'ECTION | All Rights Reserved | Web Desing thanks to <a href="http://getbootstrap.com/docs/3.3/">Bootstrap</a> | Image Desing by <a href="https://fr.freepik.com/">Freepik</a> | Site maintained by <a href="http://www.chu-lyon.fr/fr" target="_blanck">HCL</a> and <a href="https://www.univ-lyon1.fr/" target="_blanck">Lyon 1 University</a> </center>
    </footer>

</body>
</html>
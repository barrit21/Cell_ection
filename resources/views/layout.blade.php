<!DOCTYPE html>
<link rel="stylesheet" href="/css/bootstrap-editable.css">
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
    <link href="/zontal-admin/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="/zontal-admin/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="/zontal-admin/css/style.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/bootstrap-editable.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong> <p class="glyphicon glyphicon-envelope" aria-hidden="true">Email:</p> info@yourdomain.com </strong>
                    &nbsp;&nbsp;
                    <strong> <p class="glyphicon glyphicon-earphone" aria-hidden="true">Support:</p> Tel. </strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">

                    <img class="img-responsive" src="/gif/hospice.gif" />

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
                                <a href='/data' @if ($menu == 'data') class='menu-top-active' @endif>
                                    Data
                                </a>
                            </li>
                            <!-- <li><a href="forms.html">Forms</a></li>*/
                             <li><a href="login.html">Login Page</a></li>
                            <li><a href="blank.html">About Us</a></li>-->

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            @yield('content')

        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2018 Hospices Civils de Lyon | By : Lélia Debornes, Emilie Gérard-Marchant and Marianne Taupin <br/>
                    <a href="http://www.designbootstrap.com/" target="_blank"> DesignBootstrap</a> <br/>
                    <a href="http://glyphicons.com/" target="_blank"> UsingGlyphicons </a>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>
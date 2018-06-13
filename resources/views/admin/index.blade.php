@section('contentadmin')
<div class="right_col" role="main">
  <div class="row tile_count">

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
        <div class="row x_title">
            <h1>Welcome, @if (Auth::check()){{ Auth::user()->name }}@endif</h1>
        </div>
        <div class="clearfix"></div>
          <div class="jumbotron" text-align="justify">
            <h2><i class="fa fa-dashboard"></i> Dashboard</h2>
              This page is dedicated to the management of the data relating to the users of the website as well as the updating of the data on the database. Any changes made are your responsibility. <br /><br />

              In case of problems, you can always make more changes to the database directly on <a href="https://pma.univ-lyon1.fr/" target="_blank">PHPMyAdmin</a>. The update of the data can be done directly from this administrator page. For more changes to the database structure, you will need to go to PHPMyAdmin. <br /> <br />

              Remember to consult the help (at the top left of your screen, click on your name and go to "<a href="/admin/help">Help</a>") for more details.
              <br /><br /> </div>

          <div class="jumbotron">
          <h2><i class="glyphicon glyphicon-stats"></i> Google Analytics</h2>
          You can view users behaviors <a href="https://analytics.google.com/analytics/web/?authuser=1#/dashboard/SjYi9rxcSqeW4dua8ysJIw/a119771968w177153030p175901172" target="_blank">here</a>.<br />
           <b>Note :</b> To personalize your Google Analytics report, do not forget the <a href="https://support.google.com/analytics/?hl=fr#topic=3544906" target="_blank">help</a> page.<br /><br />
          </div>

          <div class="jumbotron">
            <h2><i class="glyphicon glyphicon-envelope"></i> Inbox</h2>
          Please remember to regularly check our <a href="https://mail.google.com/mail/u/1/#inbox" target="_blank">mailbox</a>.
          </div>            

      </div>
    </div>
  </div>
</div>
  <br />
</div>

@stop
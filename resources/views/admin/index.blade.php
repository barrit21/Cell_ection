@section('contentadmin')
<div class="right_col" role="main">
  <div class="row tile_count">
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Admins</span>
      <div class="count">2500</div>
      <span class="count_bottom"><i class="green">4% </i> From last Week</span>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
      <div class="count">123.50</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
      <div class="count">7,325</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
  </div>
  <!-- /top tiles -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
        <div class="row x_title">
          <div class="col-md-6">
            <h3>Network Activities <small>Number of connections on this website</small></h3>
          </div>
          <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
              <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-9 col-xs-12">
          <div id="chart_plot_01" class="demo-placeholder"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <br />

    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Device Usage</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:37%;">
                <p>Top 5</p>
              </th>
              <th>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                  <p class="">Device</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <p class="">Progress</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>IOS </p>
                    </td>
                    <td>30%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square green"></i>Android </p>
                    </td>
                    <td>10%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square purple"></i>Blackberry </p>
                    </td>
                    <td>20%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square aero"></i>Symbian </p>
                    </td>
                    <td>15%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square red"></i>Others </p>
                    </td>
                    <td>30%</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Visitors location <small>geo-presentation</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="dashboard-widget-content">
                <div class="col-md-4 hidden-small">
                  <h2 class="line_30">125.7k Views from 60 countries</h2>

                  <table class="countries_list">
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td class="fs15 fw700 text-right">33%</td>
                      </tr>
                      <tr>
                        <td>France</td>
                        <td class="fs15 fw700 text-right">27%</td>
                      </tr>
                      <tr>
                        <td>Germany</td>
                        <td class="fs15 fw700 text-right">16%</td>
                      </tr>
                      <tr>
                        <td>Spain</td>
                        <td class="fs15 fw700 text-right">11%</td>
                      </tr>
                      <tr>
                        <td>Britain</td>
                        <td class="fs15 fw700 text-right">10%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                  <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('contentadmin')

<script type="text/javascript">
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            defaultDate: '2014-09-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
        });
    });
</script>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Calendar <small>Click to add/edit events</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Calendar Events <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div id='calendar'></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
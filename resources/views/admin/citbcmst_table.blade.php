@section('contentadmin')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Cell lines Tables <small>See actual cell lines tables</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Class</th>
                  <th>Class Mixed</th>
                  <th>Class Score</th>
                  <th>Class Classification</th>
                  <th>Distance</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($citbcmsts as $citbcmst) : ?>
                <tr>
                  <td><?php echo $citbcmst->id; ?></td>
                  <td><?php echo $citbcmst->class; ?></td>
                  <td><?php echo $citbcmst->classmixed; ?></td>
                  <td><?php echo $citbcmst->classcore; ?></td>
                  <td><?php echo $citbcmst->classification; ?></td>
                  <td><?php echo $citbcmst->distance; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
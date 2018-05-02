@section('contentadmin')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Expression Level Table <small>See actual expression level table</small></h3>
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
                  <th>Expression Level </th>
                  <th>Gene ID</th>
                  <th>Cell Line Dataset ID</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($explevels as $explevel) : ?>
                <tr>
                  <td><?php echo $explevel->id; ?></td>
                  <td><?php echo $explevel->expression; ?></td>
                  <td><?php echo $explevel->gene_id; ?></td>
                  <td><?php echo $explevel->celline_dataset_id; ?></td>
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
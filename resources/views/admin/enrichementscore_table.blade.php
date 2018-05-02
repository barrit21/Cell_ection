@section('contentadmin')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Enrichement Scores Tables <small>See actual enrichement scores table</small></h3>
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
                  <th>P-value</th>
                  <th>FDR</th>
                  <th>ES</th>
                  <th>NES</th>
                  <th>More Extreme</th>
                  <th>Cell line dataset ID</th>
                  <th>Cell line ID</th>
                  <th>Dataset ID</th>
                </tr>
              </thead>


              <tbody>
                <?php foreach ($enriscores as $enriscore) : ?>
                <tr>
                  <td><?php echo $enriscore->id; ?></td>
                  <td><?php echo $enriscore->pval; ?></td>
                  <td><?php echo $enriscore->padj; ?></td>
                  <td><?php echo $enriscore->es; ?></td>
                  <td><?php echo $enriscore->nes; ?></td>
                  <td><?php echo $enriscore->moreextreme; ?></td>
                  <td><?php echo $enriscore->celline_dataset_id; ?></td>
                  <td><?php echo $enriscore->celline_id; ?></td>
                  <td><?php echo $enriscore->geneset_id; ?></td>
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
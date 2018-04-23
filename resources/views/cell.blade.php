@section('content')

<div class="content-wrapper">
  <div class="container">

  <nav aria-label="...">
    <ul class="pager">
      <li class="previous"><a href="/"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
    </ul>
  </nav>

<script type="text/javascript">
//Exportation of data selected
//Table result
var $table = $('#table');
  $(function () {
      $('#toolbar').find('select').change(function () {
          $table.bootstrapTable('refreshOptions', {
              exportDataType: $(this).val()
          });
      });
  })

      var trBoldBlue = $("table");

  $(trBoldBlue).on("click", "tr", function (){
          $(this).toggleClass("bold-blue");
  });

function linkFormatter(value) 
{
    return '<a href="/cell/'+value+'">See more</a>';
}
 function imgFormatter(value) 
 {
    return '<img src="/images/'+value+'.png"/>';
}
  function commFormatter(value) 
{
    return '<pre>'+value+'</pre>';
}
</script>

    <ul class="nav nav-tabs" id="Tabs">
      <li class="active">
        <a data-toggle="tab" href="#MenuData">Data</a>
      </li>
      <li>
        <a data-toggle="tab" href="#MenuGSEA">GSEA</a>
      </li>
    </ul>

    <div class="tab-content" id="TabContent">
      <div id="MenuData" class="tab-pane fade active in">
        <div class="col-xs-12" id="cell">
          <h1><?php echo $datum->name; ?>
            <a href="/classification_info" class="glyphicon glyphicon-info-sign"></a>
          </h1>
          <table id="table" 
            data-toggle="table"
            data-search="true"
            data-filter-control="true" 
            data-show-export="true"
            data-click-to-select="true"
            data-toolbar="#toolbar"
            data-sortable="true"
            data-sort-order="asc">

        <thead>
        <tr>
            <th data-field="Dataset" data-filter-control="select" data-sortable="true">Dataset</th>
            <th data-field="Class" data-sortable="true">Vanderbilt's class</th>
            <th data-field="Correlation" data-sortable="true">Vanderbilt's correlation</th>
            <th data-field="P-value" data-sortable="true">Vanderbilt's p-value</th>
            <th data-field="CITBCMST" data-sortable="true">CITBCMST</th>
        </tr>
        </thead>    
        <tbody>
          <?php foreach ($data as $datum) : ?>
              <tr>
                  <td><?php echo $datum->name; ?></td>
                  <td><?php echo $datum->classv; ?></td>
                  <td><?php echo $datum->correlation; ?></td>
                  <td><?php echo $datum->pval; ?></td>
                  <td><?php echo $datum->class; ?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
          </table>
        </div>
      </div>

      <div id="MenuGSEA" class="tab-pane fade">
        <div class="jumbotron">
          <h2>Coming soon...</h2>
        </div>
      </div>
    </div>



@stop
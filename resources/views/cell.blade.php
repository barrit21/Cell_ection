@section('content')

<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="/"><span aria-hidden="true">&larr;</span>Return</a></li>
  </ul>
</nav>

<script type="text/javascript">
//exporte les données sélectionnées
//Tableau result
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
  <li class="active"><a data-toggle="tab" href="#MenuData">Data</a></li>
  <li><a data-toggle="tab" href="#MenuClassif">Classification</a></li>
  <li><a data-toggle="tab" href="#MenuGSEA">GSEA</a></li>
</ul>

<div class="tab-content" id="TabContent">
  <div id="MenuData" class="tab-pane fade active in">
    <div class="col-xs-12">
      <h1><?php echo $datum->name; ?></h1>
      <table id="table" 
      data-toggle="table"
      data-search="true"
      data-filter-control="true"
      data-show-export="true"
      data-click-to-select="true"
      data-toolbar="#toolbar"
      data-sort-order="asc">

    <thead>
    <tr>
        <th data-field="Cell line" data-filter-control="input" data-sortable="true">Number of the replicate</th>
        <th data-field="Replicate" data-filter-control="input" data-sortable="true">Dataset</th>
        <th data-formatter="linkFormatter" >More</th>
    </tr>
    </thead>    
    <tbody>
          <?php foreach ($data as $res) : ?>     
        <tr>
          <td>Auto_increment</td>
          <td><?php echo trim($res, '["]'); ?></td>
        </tr>
          <?php endforeach; ?>
    </tbody>
      </table>
    </div>
  </div>

  <div id="MenuClassif" class="tab-pane fade">
    <div class="col-xs-12">
      <h1><?php echo $datum->name; ?></h1>
      <table id="table" 
      data-toggle="table"
      data-search="true"
      data-filter-control="true"
      data-show-export="true"
      data-click-to-select="true"
      data-toolbar="#toolbar"
      data-sort-order="asc">

    <thead>
    <tr>
        <th data-field="Replicate" data-filter-control="input" data-sortable="true">Number of the replicate</th>
        <th data-field="Class" data-filter-control="input" data-sortable="true">Vanderbilt's class</th>
        <th data-field="Correlation" data-filter-control="input" data-sortable="true">Vanderbilt's correlation</th>
        <th data-field="P-value" data-filter-control="input" data-sortable="true">Vanderbilt's p-value</th>
        <th data-field="CITBCMST" data-filter-control="input" data-sortable="true">CITBCMST</th>
    </tr>
    </thead>    
    <tbody>
      <?php foreach ($data as $res) : ?>
          <tr>
              <td><?php echo $res; ?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
      </table>
    </div>
  </div>

  <div id="MenuGSEA" class="tab-pane fade">
    <div class="col-xs-12">
      <h1><?php echo $datum->name; ?></h1>
      <table id="table" 
      data-toggle="table"
      data-search="true"
      data-filter-control="true"
      data-show-export="true"
      data-click-to-select="true"
      data-toolbar="#toolbar"
      data-sort-order="asc">

    <thead>
    <tr>
        <th data-field="Cell line" data-filter-control="input" data-sortable="true">Name of the Geneset</th>
        <th data-field="Replicate" data-filter-control="input" data-sortable="true">Enrichissement score</th>
    </tr>
    </thead>    
    <tbody>
      <?php foreach ($data as $res) : ?>
          <tr>
              <td><?php echo $res; ?></td>

          </tr>
      <?php endforeach; ?>
    </tbody>
      </table>
    </div>
  </div>


</div>


@stop
@section('content')

<div class="content-wrapper">
  <div class="container" id="gene">

<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="/"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
  </ul>
</nav>

<script type="text/javascript">
//exporte les données sélectionnées
//Tableau résult
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
  <li class="active"><a data-toggle="tab" href="#MenuPathways">Pathways</a></li>
  <li><a data-toggle="tab" href="#MenuExpression">Expression level</a></li>
</ul>

  <div class="tab-content" id="TabContent">
  <div id="MenuPathways" class="tab-pane fade active in">
    <div class="jumbotron">
      <h2>Coming soon...</h2>
    </div>
    <!--
    <h1><?php echo $datum->hugo; ?></h1>
    <div align="justify">
      <?php foreach ($data as $pathway) : ?>
        <?= $pathway->name; ?>
      <?php endforeach; ?>
    </div>

  </div> -->

  <div id="MenuExpression" class="tab-pane fade">
    <!-- <div class="col-xs-12">
      <h1><?php echo $datum->hugo; ?></h1>
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
        <th data-field="Cell line" data-filter-control="input" data-sortable="true">Name</th>
    </tr>
    </thead>    
    <tbody>
      <?php foreach ($data as $datum) : ?>
          <tr>
              <td>
                  <?= $datum->hugo; ?>
              </td>
              <td><?php echo $datum->id;?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
      </table>
    </div>
  </div>

  <div id="MenuGSEA" class="tab-pane fade">
    <div class="col-xs-12">
      <h1><?php echo $datum->hugo; ?></h1>
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
        <th data-field="Cell line" data-filter-control="input" data-sortable="true">Name</th>
    </tr>
    </thead>    
    <tbody>
      <?php foreach ($data as $datum) : ?>
          <tr>
              <td>
                  <?= $datum->hugo; ?>
              </td>
              <td><?php echo $datum->id;?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
      </table>
    </div>
  </div> -->


</div>
</div>
</div>


@stop
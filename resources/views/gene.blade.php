@section('content')

<?php
$expressionlevel=[];
foreach($expressionlevels as $expression){
  foreach($expression as $exp){
    $expressionlevel[]=$exp;
  }
}
$nbpathways=count($data);
$nbcell=count($expressionlevel);
?>

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

function linkFormatterOther(value)
{
    return '<a href="/geneset/'+value+'">'+value+'</a>';
}
function linkFormatterBI(value)
{
    return '<a href="http://software.broadinstitute.org/gsea/msigdb/cards/'+value+'" target="_blank">Link</a>';
}
function linkFormatterCell(value)
{
    return '<a href="/cell/'+value+'">'+value+'</a>';
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



<div class="content-wrapper">
  <div class="container">



    <ul class="nav nav-tabs" id="Tabs">
      <li class="active">
        <a data-toggle="tab" href="#MenuPathways">Pathways</a>
      </li>
      <li>
        <a data-toggle="tab" href="#GeneExp">Gene Expression</a>
      </li>
    </ul>

      <div class="tab-content" id="TabContent">
          <!-- First Menu -->
          <div id="MenuPathways" class="tab-pane fade active in">
            <div class="col-xs-12" id="cell">
                <h1><?php echo $genes->hugo; ?>
                  <small>
                    <?php if(!is_null($gene_title)) {
                      echo $gene_title-> hugo;
                    } ?>
                  </small>
                </h1>
                <blockquote class="blockquote">
                  <h3>Entrez ID : <?= $genes->entrez; ?></h3>
                  <h4><?= $genes->hugo;?> is involved in <?= count($data);?> pathways.</h4>
                </blockquote>

                <table id="table"
                    data-toggle="table"
                    data-search="true"
                    data-filter-control="true"
                    data-show-export="true"
                    data-click-to-select="true"
                    data-toolbar="#toolbar"
                    data-sortable="true"
                    data-sort-order="asc"
                    data-sort-name="hugo"
                    class="table table-striped table-bordered">

              <thead>
              <tr>
                  <th data-field="Patwhay" data-formatter="linkFormatterOther" data-filter-control="select" data-sortable="true">Pathway</th>
                  <th data-formatter="linkFormatterBI">Broad Institute's website</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $datum) : ?>
                    <tr>
                        <td><?php echo $datum->name; ?></td>
                        <td><?php echo $datum->name; ?></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
                </table>
          </div>
        </div>

      <!-- Second Menu -->
      <div id="GeneExp" class="tab-pane fade">
        <div class="col-xs-12" id="cell">
            <h1>
              <?php echo $genes->hugo; ?>
              <small>
                <?php if(!is_null($gene_title)) {
                  echo $gene_title-> hugo;
                } ?>
              </small>
            </h1>
            <blockquote class="blockquote">
              <h3>Entrez ID : <?= $genes->entrez; ?></h3>
            <?php if(is_null($gene_title)) {
              echo '<div class="alert alert-warning" id="warningexp">No probsets were found for this gene.</div>';
            } else {
              echo '<h4>'.$genes->hugo.' has been found in '.$nbcell.' cell lines.</h4>';
            } ?>
            </blockquote>

            <table id="table"
              data-toggle="table"
              data-search="true"
              data-filter-control="true"
              data-show-export="true"
              data-click-to-select="true"
              data-toolbar="#toolbar"
              data-sortable="true"
              data-sort-order="asc"
              class="table table-striped table-bordered">

          <thead>
          <tr>
              <th data-field="Cell" data-formatter="linkFormatterCell" data-filter-control="select" data-sortable="true">Cell line</th>
              <th data-field="Score" data-sortable="true">Ranked Gene score</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($expressionlevel as $expressionlevels) : ?>
                <tr>
                    <td><?php echo $expressionlevels->name; ?></td>
                    <td><?php echo $expressionlevels->expression; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('content')

<?php
$nbreplicate=count($data);

function GSEA($pval){
  if($pval < 0.01)
    {
      $class = 'class="valid-GSEA"';
      return $class;
    }
  elseif ($pval < 0.05) {
      $class = 'class="hypothetical-valid-GSEA"';
      return $class;
  }
}

?>

<div class="content-wrapper">
  <div class="container">

  <nav aria-label="...">
    <ul class="pager">
      <li class="previous"><a href="#null" onclick="javascript:history.back();"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
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

function linkFormatterGene(value) 
{
    return '<a href="/gene/'+value+'">'+value+'</a>';
}
function linkFormatterGeneset(value) 
{
    return '<a href="/geneset/'+value+'">'+value+'</a>';
}
 function imgFormatter(value) 
 {
    return '<img src="/images/'+value+'.png"/>';
}
  function commFormatter(value) 
{
    value=value.replace("&amp;", "&");
    return value;
}
</script>

    <ul class="nav nav-tabs" id="Tabs">
      <li class="active">
        <a data-toggle="tab" href="#MenuData">Data</a>
      </li>
      <li>
        <a data-toggle="tab" href="#MenuGenes">Expression level</a>
      </li>      
      <li>
        <a data-toggle="tab" href="#MenuGSEA">GSEA</a>
      </li>
    </ul>

    <!-- First Menu -->
    <div class="tab-content" id="TabContent">
      <div id="MenuData" class="tab-pane fade active in">
        <div class="col-xs-12" id="cell">
          <h1><?php echo $cell->name; ?></h1>

          <blockquote class="blockquote">
              <h3><span  class="glyphicon glyphicon-info-sign"></span> Click <a href="/classification_info">here</a> to see more informations about Vanderbilt and CITBCMST's classification.</h3>
              <h4><?= $cell->name; ?> has <?= count($data); ?> replicates in our data for this meta-analysis.</h4>
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
            class="table table-striped table-bordered"
            >

        <thead>
        <tr>
            <th data-field="Dataset" data-filter-control="select" data-sortable="true">Dataset</th>
            <th data-field="Class" data-sortable="true">Vanderbilt's class</th>
            <th data-field="Correlation" data-sortable="true">Vanderbilt's correlation</th>
            <th data-field="P-value" data-sortable="true" data-formatter="commFormatter">Vanderbilt's p-value</th>
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

      <!-- Second Menu -->
      <div id="MenuGenes" class="tab-pane">
        <div class="col-xs-12" id="cell">
          <h1><?php echo $cell->name; ?></h1>
        </div>
        <blockquote class="blockquote">
          <?php if(!$genes_actives->count() > 0) {
              echo '<div class="alert alert-warning" id="warningexp">No GSEA has been proceed on this cell line, so there is no data of genes expressions available.</div>';
            } else {
              echo '<h4>There is '.count($genes_actives).' genes.</h4>';
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
          data-sort-name="hugo"
          data-show-pagination-switch="true"
          data-pagination="true"
          data-page-list="[10, 100, 1000, 10000, ALL]"
          data-response-handler="responseHandler"
          data-show-refresh="true"
          class="table table-striped table-bordered"
        >

        <thead>
        <tr>
            <th data-formatter="linkFormatterGene">Gene name</th>
            <th data-field="Gene symbol" data-filter-control="input" data-sortable="true">Gene symbol</th>
            <th data-field="Gene Title" data-filter-control="input" data-sortable="true">Gene Title</th>
            <th data-field="Score" data-sortable="true">Ranked gene level</th>
        </tr>
        </thead>    
        <tbody>
          <?php foreach ($genes_actives as $genes_active) : ?>
              <tr>
                  <td><?php echo $genes_active->name; ?></td>
                  <td><?php echo $genes_active->gene_symbol; ?></td>
                  <td><?php echo $genes_active->gene_title; ?></td>
                  <td><?php echo $genes_active->score; ?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
          </table>
        </div>



    <!-- Third Menu -->
    <div id="MenuGSEA" class="tab-pane">
        <div class="col-xs-12" id="cell">
          <h1>Enrichment in phenotype : <?php echo $cell->name; ?></h1>
        </div>
        <blockquote class="blockquote">
          <h3><span  class="glyphicon glyphicon-info-sign"></span> Click <a href="http://www.gsea-msigdb.org/gsea/doc/GSEAUserGuideFrame.html?_Interpreting_GSEA_Results" target="_blank">here</a> to see more informations about GSEA results.</h3>
          <h3>You will find <a href="/GSEA/parameters">here</a> more informations about our GSEA analysis' parameters.</h3>
        </blockquote>

        <div class="jumbotron" id="infos_GSEA">
          <?php if(!$gsea_results->count() > 0) {
              echo '<div class="alert alert-warning" id="warningexp">No GSEA has been proceed on this cell line.</div>';

          } else {
              echo '<li>'.count($gsea_results).' / '.$nbpathways.' gene sets are upregulated in phenotype MCF7.</li>';
              echo '<li>'.count($validation).' gene sets are significant at FDR < 25%.</li>';
              echo '<li>'.count($pval1percent).' gene sets are significantly enriched at nominal pvalue < 1%.  <span class="color-sample valid-GSEA"></span></li>';
              echo '<li>'.count($pval5percent).' gene sets are significantly enriched at nominal pvalue < 5%.  <span class="color-sample hypothetical-valid-GSEA"></span></li>';              
          } ?> 
        </div>

        <table id="table" 
          data-toggle="table"
          data-search="true"
          data-filter-control="true" 
          data-show-export="true"
          data-click-to-select="true"
          data-toolbar="#toolbar"
          data-sortable="true"
          data-sort-order="asc"
          data-sort-name="link"
          data-show-pagination-switch="true"
          data-pagination="true"
          data-page-list="[10, 100, 1000, 10000, ALL]"
          data-response-handler="responseHandler"
          data-show-refresh="true"
          class="table table-striped table-bordered"
        >
          <thead>
            <tr>
                <th data-field="link" data-formatter="linkFormatterGeneset">Pathway's name</th>
                <th data-field="size" data-sortable="true">Size</th>
                <th data-field="ES" data-sortable="true">Enrichment Score</th>
                <th data-field="NES" data-sortable="true">Normalize ES</th>
                <th data-field="pval" data-sortable="true">Nominale p-value</th>
                <th data-field="FDR" data-sortable="true">FDR</th>
                <th data-field="FWER" data-sortable="true">FWER</th>
                <th data-field="rank_at_max" data-sortable="true">Rank at max</th>
                <!-- <th data-field="Leading EDGE" colspan=3 data-sortable="true">Leading EDGE</th> -->
                <th data-field="Tags" data-sortable="true">Tags</th>
                <th data-field="List" data-sortable="true">List</th>
               <th data-field="Signal" data-sortable="true">Signal</th>
            </tr>
          </thead>    
          <tbody>
            <?php foreach ($gsea_results as $gsea_result) : ?>
                <tr <?php echo GSEA($gsea_result->NOMpval); ?>>
                    <td><?php echo $gsea_result->link; ?></td>
                    <td ><?php echo $gsea_result->size; ?></td>
                    <td ><?php echo $gsea_result->ES; ?></td>
                    <td ><?php echo $gsea_result->NES; ?></td>
                    <td ><?php echo $gsea_result->NOMpval; ?></td>
                    <td ><?php echo $gsea_result->FDRqval; ?></td>
                    <td><?php echo $gsea_result->FWERqval; ?></td>
                    <td ><?php echo $gsea_result->rank_at_max; ?></td>
                    <td><?php echo $gsea_result->tags; ?></td>
                    <td ><?php echo $gsea_result->list; ?></td>
                    <td><?php echo $gsea_result->signal; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>


@stop
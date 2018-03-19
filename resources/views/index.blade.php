@section('content')

<script>
    $( function() {
      $.widget( "custom.catcomplete", $.ui.autocomplete, {
        _create: function() {
          this._super();
          this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
        },
        _renderMenu: function( ul, items ) {
          var that = this,
              currentCategory = "";
          $.each( items, function( index, item ) {
            var li;
            if ( item.category != currentCategory ) {
              ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
              currentCategory = item.category;
            }
            li = that._renderItemData( ul, item );
            if ( item.category ) {
              li.attr( "aria-label", item.category + " : " + item.label );
            }
          });
        }
      });



      $( "#searchH" ).catcomplete({
        delay: 0,
        limit: 10,
        source : function(request, response) {
          $.ajax({
            url : "/cellection/query",
            data : {term : request.term},
            dataType : "json",
            success : function(data) {
              if (data.length > 0) {
                response( $.map( data, function( item ) {
                  return {

                    value: item.value,
                    category: item.category,
                  }
                }));
              }
              else{
                response([{ category: 'No results found', val: "",label:""}]);
              }
            }
          });
        }
      });
    } );
  </script>
 
<div class="col-xs-12">
    <div class="col-xs-8">
    <input id="searchH" class="form-control" placeholder="Search Genes/Cell Lines or Pathway" name="q[entry]" style="margin-top: .5em">
    </div>
    <div class="col-sm-4" >
    <input type="submit" name="commit" value="Search" id="submitH" class="btn btn-default" style="margin-top: .5em" disabled="disabled" />
    </div>
</div>





<script type="text/javascript">
//exporte les données sélectionnées
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

<div class="col-xs-12">
    <h1>CELL LINES TABLE</h1>
    <table id="table" 
    data-toggle="table"
    data-search="true"
    data-filter-control="true"
    data-show-export="true"
    data-click-to-select="true"
    data-toolbar="#toolbar"
    data-sort-order="asc"
    >
        <thead>
            <tr>
                <th data-field="Cell line" data-filter-control="input" data-sortable="true">Cell line</th>
                <th data-field="Replicate" data-filter-control="input" data-sortable="true">Replicate</th>
                <th data-field="Datasets" data-filter-control="select" data-sortable="true">Datasets</th>
                <th data-formatter="linkFormatter" >More</th>
            </tr>
        </thead>    
        <tbody>
            <?php foreach ($data as $datum) : ?>
                <tr>
                    <td>
                        <?= $datum->name; ?>
                    </td>
                    <td><?php echo $datum->replicate; ?></td>
                    <td><?php echo $datum->list_dataset; ?></td>
                    <td><?php echo $datum->id;?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



@stop
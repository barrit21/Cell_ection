@section('content')

<h2>Please, enter your research :</h2>
<div class="col-xs-12">
    <div class="col-xs-8">
        <input id="searchH" class="form-control" placeholder="Search Genes or Cell Lines" name="q[entry]" style="margin-top: .5em">
    <input type="hidden" id="searchType">
    </div>
</div>

<script type="text/javascript">
$( function() {
  $.widget( "custom.catcomplete", $.ui.autocomplete, {
    _create(){
      this._super();
      this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
    },
    _renderMenu( ul, items ) {
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
    },
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
                    } else {
                      response([{ category: 'No results found', val: "",label:""}]);
                    }
                }
            });
        },
    select(event, item){
      let cat = item.item.category
      let value = item.item.value

      if(cat == "Cell lines"){
        window.location.href = "/cell/" + value;
      } else if (cat == "Genes"){
        window.location.href = "/gene/" + value;
      }
    }
    });
  $(document).on('click','.ui-autocomplete-category',function(){
    alert('click');
  })
});
</script>
@endsection
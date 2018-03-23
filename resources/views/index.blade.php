@section('content')
<form align="center" id="q-form" cache="false" action="/search" accept-charset="UTF-8" method="get"> 
  <div class="col-xs-12">

    <script>
        $( function() 
        {
          $.widget( "custom.catcomplete", $.ui.autocomplete, 
          {
            
            _create: function() 
            {
              this._super();
              this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
            },
            
            _renderMenu: function( ul, items ) 
            {
              var that = this,
              currentCategory = "";

              $.each( items, function( index, item ) 
              {
                var li;
                if ( item.category != currentCategory ) 
                {
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
                    console.log(data);
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

      <div class="col-xs-8">
          <input id="searchH" class="form-control" placeholder="Search Genes or Cell Lines" name="q[entry]" style="margin-top: .5em">
      </div>
      <div class="col-sm-4" >
        <input type="submit" name="commit" value="Search" id="submitH" class="btn btn-default" disabled="disabled" />
      </div>
  </div>
</form>

<script type="text/javascript">
  $("#searchH").keyup(function () 
  {
    if ($(this).val() != "")
    {
      $("#submitH").attr("disabled", false)
    }
    else 
    {
      $("#submitH").attr("disabled", true)
    }
  });
</script>


@stop
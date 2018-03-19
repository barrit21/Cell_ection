@section('content')

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




@stop
@section('content')

<!-- Home 1 -->
<div class="content-wrapper" id="home1">
  <div class="container">
    <div class="col-md-12 text-center" id="home1text">
      <h1 id="maintitle">CELL'ECTION</h1>
      <p id="mainp">Database of specific researches of breast cancer cell lines</p>
      <a href="#research" ><div class="glyphicon glyphicon-menu-down" id="target"></div></a>
    </div>    

  </div>
</div>

<div class="content-wrapper" >
<!-- Research -->
  <div id="research" class="col-xs-6 col-sm-4 center">
    <h2 class="text-center">Please, enter your research <a href="/about_us" class="glyphicon glyphicon-info-sign"></a></h2>
    <div class="col-xs-12 center" id="divresearch">
        <div class="col-xs-6 col-sm-6 center" id="research_bar">
            <input id="searchH" class="form-control center" placeholder="Search Genes, Cell Lines or Pathways" name="q[entry]" style="margin-top: .5em">
            <input type="hidden" id="searchType">
        </div>
    </div>
  </div>
</div>

<!-- Script for autocomplete research -->
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

<!-- Scroll down on click -->
<script>
$('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});
</script>


@endsection
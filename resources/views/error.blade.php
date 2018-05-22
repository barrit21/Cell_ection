@section('content')

<div class="content-wrapper">
 	<div class="container">
		<nav aria-label="...">
			<ul class="pager">
	        <li class="previous"><a href="#null" onclick="javascript:history.back();"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
			</ul>
		</nav>
		<div class="jumbotron">
		  <h1>Something went wrong</h1>
		  <p>The search you tried to perform does not work. It seems that the gene or the cell line you are looking for is not present in our database.</p>
		  <p>Please try with another name. We remember you that the names of the genes are in HUGO format. For more information, click <a href="https://www.genenames.org/" target="_blank">here</a>.</p>
		  <p><a class="btn btn-primary btn-lg" href="/" role="button">Back to your search</a></p>
		</div>
	</div>
</div>



@stop
@section('content')

<div class="content-wrapper">
	<div class="container">

	<nav aria-label="...">
		<ul class="pager">
        <li class="previous"><a href="#null" onclick="javascript:history.back();"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
		</ul>
	</nav>

	<div class="jumbotron">
		<blockquote class="blockquote" id="GSEAblockquote">
			<h2>GSEA parameters</h2>
			We chose several different metrics to perform our GSEA analyzes. The GSEA data was generated through the R fgsea pakage.

		</blockquote>
		<li>The metric used to assign a rank to genes, we used the tTest.</li>
		<li>We used the set of C6 pathways, the set representing the oncogenic signature.</li>
	</div>

	</div>
</div>

@endsection
@section('content')

<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="#null" onclick="javascript:history.back();"><span aria-hidden="true">&larr;</span>Return</a></li>
  </ul>
</nav>

<div class="jumbotron">
	<h2><b>About classification Vanderbilt/CITBCMST</b></h2>

	<div align="justify">
		CIT and Vanderbilt are classification tools. By means of statistical tests, these tools are able to give the class of the cell line. However, there are disagreements at the level of classifications. In addition, the classification is named in different ways between these two tools. </br>
	</div>
	
	<h3>Vanderbilt</h3>
	<div align="justify">
		There are 6 subtypes of classification :
		<ul>
			<li>2 basals : BL1 and BL2</li>
			<li>1 immunomodulator : IM</li>
			<li>1 mesenchymal : M</li>
			<li>1 cellular mesenchymal : MSL</li>
			<li>1 luminal with androgen receptors : LAR</li>
		</ul>
		<div align="center"><img class="img-responsive" src="/img/VBT.png"/></div>
	</div>

	<h3>CITBCMST</h3>
	<div align="justify">
		There are 6 subtypes of classification :
		<ul>
			<li>BasL</li>
			<li>mApo</li>
			<li>lumC</li>
			<li>lumB</li>
			<li>normL</li>
			<li>lumA</li>
		</ul>
		<div align="center"><img class="img-responsive" src="/img/CITB.png"/></div>
	</div>
</div>

@stop
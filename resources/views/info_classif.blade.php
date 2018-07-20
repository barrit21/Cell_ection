@section('content')

<div class="content-wrapper">
 	<div class="container">
		<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="#null" onclick="javascript:history.back();"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
		  </ul>
		</nav>

		<div class="jumbotron">
			<h1 class="text-center">Breast cancer molecular classifications</h1>

			<div class="page-header">
  				<h3>Vanderbilt</h3>
			</div>
			<div class="media" align="justify">
				This tool divides breast cancer cells into 6 subtypes:
				<ul>
					<li>BL1, BL2: basal</li>
					<li>IM: immunomodulator</li>
					<li>M: mesenchymal</li>
					<li>MSL: cellular mesenchymal</li>
					<li>LAR: luminal with androgen receptors</li>
				</ul>
				<div align="center"><img class="img-responsive" src="/img/VBT.png"/></div>
			</div>

			<div class="page-header">
  				<h3>CITBCMST</h3>
			</div>
			<div class="media" align="justify">
				This tool classifies breast cancer cells into the following 6 subtypes:
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

	</div>

</div>



</div>




@stop
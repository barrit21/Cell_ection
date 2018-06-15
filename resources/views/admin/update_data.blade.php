@section('contentadmin')

<!-- page content -->
<div class="right_col" role="main">

	<!-- Start vertical navigation -->
	<div id="op-verticalnav">
		<ul class="op-sectionlist">
			<li class="op-v-item"><a class="op-v-link" href="#cell"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg">Update cell lines</span></span></a></li>
			<li class="op-v-item"><a class="op-v-link" href="#genes_genesets"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg">Update genes and genesets</span></span></a></li>
			<li class="op-v-item"><a class="op-v-link" href="#explevels"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg">Update expression levels</span></span></a></li>
			<li class="op-v-item"><a class="op-v-link" href="#GSEA"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg">Update GSEA's enrichment score</span></span></a></li>			
		</ul>
	</div>
	<!-- end vertical navigation -->

	<div class="alert alert-warning" id="warning_order" align="justify">
  		<strong>Warning <i class="fa fa-warning"></i></strong> The loading of the data requires to be done in a very precise order. Indeed, you can not incorporate GSEA data if cell lines or genesets are not reported before. Please, make sure that the data you are about to load are well integrated in the correct order and format. If the data, particularly from GSEA, relate to already known cell lines and genesets, then there should be no problems. <strong>For more informations, please consult the <a href="/admin/help" target="_blank">help</a> page for updating the data.</strong> <br/> <br />
  		<strong>In addition, be sure to load files in csv format. Missing data must still be surrounded by semicolon (";") in column order.</strong>
	</div>

	<form action="" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		
		<section id="cell">
		<h1><i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> Update cell lines :</h1>
		<div>
			<input type="file" name="celline"></input>

			@if ($errors->has('celline'))
				<br />
                <small class="alert alert-warning alert-dismissible">{{ $errors-> first('celline') }}</small>
            @endif

			<input name="enregistrer" value="Submit" type="submit"></input>
		</div><br /> <br />

		<!-- Error -->
		@if (Session::has('flash_message_cell_format'))
			<br /> <br />
        	<div class="alert alert-danger" role="alert">
            	<h2>{{Session::get('flash_message_cell_format')}}</h2>
            	<br /><br />

            	<table
				id="table-error-cell"
				class="table table-striped table-bordered"
            	>
            		<thead>
            			<tr>
            				<th>Column</th>
            				<th>Type of content</th>
            				<th>Exemple</th>
            			</tr>
            		</thead>
            		<tbody>
            			<tr>
            				<td>.CEL file</td>
            				<td>VARCHAR(100)</td>
            				<td>BT.20_SS331465_HG.U133_Plus_2_HCHP.182965_.CEL</td>
						</tr>
						<tr>
            				<td>cell line</td>
            				<td>VARCHAR(45)</td>
            				<td>BT20</td>
						</tr>
						<tr>	
            				<td>replicate</td>
            				<td>INTEGER</td>
            				<td>12</td>
						</tr>
						<tr>
            				<td>dataset's name</td>
            				<td>VARCHAR(45)</td>
            				<td>Krupp13</td>
						</tr>
						<tr>
            				<td>Vanderbilt's class</td>
            				<td>VARCHAR(45)</td>
            				<td>BL2</td>
						</tr>
						<tr>
            				<td>Vanderbilt's correlation</td>
            				<td>FLOAT</td>
            				<td>0.234</td>
						</tr>
						<tr>
            				<td>Vanderbilt's pvalue</td>
            				<td>FLOAT</td>
            				<td>0.005</td>
						</tr>
						<tr>
            				<td>CIT class</td>
            				<td>VARCHAR(45)</td>
            				<td>basL</td>
						</tr>
						<tr>
            				<td>CIT classmixed</td>
            				<td>VARCHAR(45)</td>
            				<td>basL</td>
						</tr>
						<tr>
            				<td>CIT classcore</td>
            				<td>FLOAT</td>
            				<td>0.48879</td>
						</tr>
						<tr>
            				<td>CIT classification</td>
            				<td>VARCHAR(45)</td>
            				<td>basL</td>
						</tr>
						<tr>
            				<td>CIT distance</td>
            				<td>DOUBLE(8,4)</td>
            				<td>45.4879</td>
            			</tr>
            		</tbody>
            	</table>
            </div>
		@endif

		@if (Session::has('flash_message_cell'))
			
			<br /> <br />
        	<div class="alert alert-danger" role="alert">
            	<h2>{{Session::get('flash_message_cell')}}</h2>
            	Please check that your columns are correctly delimited and that there is no semicolon (';') anywhere else between your columns.
         	</div>
        @endif

		<!-- Success -->
		@if (Session::has('flash_message_success_cell'))
			<div class="alert alert-success" role="alert">
				<h2>{{Session::get('flash_message_success_cell')}}</h2>				
			</div>
		@endif

		<div class="jumbotron">
			<h2>Reminder CSV format :</h2>
			<div class="col-md-12" id="reminder">
				<span style="color:#BCBCBCFF;">.CEL file; cell line; replicate; dataset's name; VDB class; VDB correlation; VDB pvalue; CIT class; CIT classmixed; CIT classcore; CIT classification; CIT distance </span><br />
				BT.20_SS331465_HG.U133_Plus_2_HCHP.182965_.CEL; BT20; 12; Krupp13; BL2; 0.234; 0.005; basL; basL; NA; &emsp; ; &emsp; ; <br />
				BT.20_SS331466_HG.U133_Plus_2_HCHP.182966_.CEL; BT20; 12; Krupp13; BL2; 0.241; 0.008; basL; basL; NA; &emsp; ; &emsp; ; <br />
			</div>
			<br /><br />
		</div>
		</section><br /><br />

		<section id="genes_genesets">
			<h1><i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> Update genes and genesets :</h1>
			<div>
				<input type="file" name="gene_geneset"></input>
				<input name="enregistrer" value="Submit" type="submit"></input>
			</div><br /> <br />
			<div class="jumbotron">
				<h2>Reminder CSV format :</h2>
				<div class="col-md-12" id="reminder">
					<span style="color:#BCBCBCFF;"> geneset name; gene's hugo; gene's info; entrez ID </span><br />
					GLI1_UP.V1_DN; COPZ1; &emsp; ; 22818 <br />
					GLI1_UP.V1_DN; C10orf46; &emsp; ; 143384<br />
				</div>
				<br /><br />
			</div>
		</section><br /><br />

		<section id="explevels">
			<h1><i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> Update expression levels :</h1>
			<div>
				<input type="file" name="explevels"></input>
				<input name="enregistrer" value="Submit" type="submit"></input>
			</div><br /> <br />
			<div class="jumbotron">
				<h2>Reminder CSV format :</h2>
				<div class="col-md-12" id="reminder">
					<span style="color:#BCBCBCFF;"> cell line's name; gene's name; gene's symbol; gene's title; score </span><br />
					MCF7; TCN1; TCN1; transcobalamin I (vitamin B12 binding protein, R binder family); 10.03 <br />
					MCF7; SKAP1; SKAP1; src kinase associated phosphoprotein 1; 9.03 <br />
				</div>
				<br /><br />
			</div>
		</section><br /><br />

		<section id="GSEA">
			<h1><i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> Update GSEA's enrichment score :</h1>
			<div>
				<input type="file" name="enrichmentscore"></input>
				<input name="enregistrer" value="Submit" type="submit"></input>
			</div><br /> <br />
			<div class="jumbotron">
				<h2>Reminder CSV format :</h2>
				<div class="col-md-12" id="reminder">
					<span style="color:#BCBCBCFF;"> geneset's name; cell line's name; link; size; ES; NES; NOMpval; FDRqval; FWERqval; rank_at_max; tags; list; signal </span><br />
					DCA_UP.V1_UP; BT474; DCA_UP.V1_UP; 161; 0.319; 1.225; 0.1241; 1; 0.912; 2334; tags=17%; list=11%; signal=19% <br />
					KRAS.600_UP.V1_DN; BT474; KRAS.600_UP.V1_DN; 266; 0.3239; 1.0334; 0.3896; 1; 0.997; 1166; tags=14%; list=6%; signal=15%<br />
				</div>
				<br /><br />
			</div>
		</section><br /><br />
	</form>
</div>


<script>
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>

@endsection
@section('contentadmin')

<div class="right_col" role="main">
  <div class="row tile_count">

	 <!-- Start horizontal navigation -->
	<nav>
	 	<div id="op-horizontalnav">
	 		<ul class="op-sectionlist">
				  <li class="op-v-item"><a class="op-v-link" href="#database"><i class="fa fa-database"></i> DATABASE</a></li>
				  <li class="op-v-item"><a class="op-v-link" href="#update"><i class="fa fa-table"></i> UPDATING DATA</a></li>
				  <!-- <li class="op-v-item"><a class="op-v-link" href="#order"><i class="fa fa-list-alt"></i> ORDER</a></li> 
				  <li class="op-v-item"><a class="op-v-link" href="#format"><i class="fa fa-file-text"></i> FORMAT</a></li> -->
			</ul>
	 	</div>
 	</nav>
	<!-- end horizontal navigation -->

	<!-- Start vertical navigation -->
	<div id="op-verticalnav">
		<ul class="op-sectionlist">
			<li class="op-v-item"><a class="op-v-link" href="#database"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg"><i class="fa fa-database"></i> DATABASE</span></span></a></li>
			<li class="op-v-item"><a class="op-v-link" href="#update"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg"><i class="fa fa-table"></i> UPDATING DATA</span></span></a></li>
			<!-- <li class="op-v-item"><a class="op-v-link" href="#order"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg"><i class="fa fa-list-alt"></i> ORDER</span></span></a></li>
			<li class="op-v-item"><a class="op-v-link" href="#format"><span class="v-marker"></span><span class="op-v-itemdesc"><span class="op-v-itembg"><i class="fa fa-file-text"></i> FORMAT</span></span></a></li>	-->		
		</ul>
	</div>
<!-- end vertical navigation -->

	<!-- Wrapper sections -->
	<div class="content">
		<section id="database">
			<div class="jumbotron" align="justify">
				<h2><i class="fa fa-database"></i> DATABASE</h2>
				<span>
					The database is configured on <a href="https://pma.univ-lyon1.fr/">PHPMyAdmin</a>. PHPMyAdmin (PMA) is a management web application for MySQL database management systems built mainly in PHP and distributed under the GNU GPL license. Please remember your credentials and make sure you are connected to the right service of the ISD. Once connected, you can see in the navigation bar on the right of your screen the database "cellection". It is this database which is connected to the website for the moment. <br /><br />
					
					<div class="text-center">
						<img src="/img/PMA.png" class="rounded mx-auto d-block" height="328" width="756"></img>
					</div><br /><br />

					With this navigation, you can navigate between the tables containing the data. You can display each of these tables, view their structure and even import your own files directly from this interface. However, it is strongly discouraged to download your data directly from this interface. To update the database, please follow the instructions given in this <a href="#update">help</a> and go to <a href="/admin/database/update_data">this</a> page.<br /><br />

					<div class="text-center">
						<img src="/img/PMAglobal.png" class="rounded mx-auto d-block" height="328" width="756"></img>
					</div><br /><br />				

					The addition of new tables can be configured on PHPMyAdmin, by clicking on "New table" ("Nouvelle table" in this image) in the interface on the right. By clicking on "cellection" you can have a global view of your tables and also empty them, insert data by hand, see their structures etc.
				</span>
			</div>
		</section>
		
		<section id="update">
			<div class="jumbotron" align="justify">
				<h2><i class="fa fa-table"></i> UPDATING DATA</h2>
				<span>
					The integration of new data will be preferentially done on <a href="/admin/database/update_data" target="_blank">this page</a>, if this update does not require to change the actual structure of the database. You must load the file in the correct fields corresponding to the format shown below ("Reminder CSV format"). After integrating the new data, we recommend that you check their compliance directly in <a href="https://pma.univ-lyon1.fr/">PHPMyAdmin</a>.
					
					Data integration <strong>must follow a precise order</strong>. Indeed, you can not update GSEA data if the cell line, its .CEL file, the genes involved or the geneset are missing. <br /> <br />

					<strong style="color:#EE7132FF;">Imported files must be in CSV format, columns must be separated by semicolon (";").</strong> In the opposite cases, the integration of the data may not work or fill the database with erroneous data. Pay particular attention to the presence of others semicolon in the cells. If there are any, they will be counted as a "new column" and this will then shift the entire integration. <br /> <br />

					<h2> &emsp; <i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> New cell lines</h2>

					In the first place to update the data, you must insert new cell lines if they are not already present in the database. Each cell line is normally linked to a .CEL file that you must also complete. The expected file is in the format below. <strong>Note that the first line must not be present in the file you are importing.</strong><br /><br />

					<div class="text-center">
						<img src="/img/upcell.png" class="rounded mx-auto d-block"></img>
					</div><br /><br />	

					<h3>CSV format :</h3>
					<div class="col-md-12" id="reminder">
						<span style="color:#BCBCBCFF;"> cell line's name; gene's name; gene's symbol; gene's title; score </span><br />
						MCF7; TCN1; TCN1; transcobalamin I (vitamin B12 binding protein, R binder family); 10.03 <br />
						MCF7; SKAP1; SKAP1; src kinase associated phosphoprotein 1; 9.03 <br />
					</div>
					<br /><br />

					<h2> &emsp; <i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> New genes / genesets</h2>

					If the update concerns the integration of new genes / genesets, you must refer to the correct data import form and follow the CSV format presented below. <strong>The first line must not be present in the CSV import file.</strong><br /><br />

					<div class="text-center">
						<img src="/img/upgg.png" class="rounded mx-auto d-block"></img>
					</div><br /><br />	
					
					<h3>CSV format :</h3>
					<div class="col-md-12" id="reminder">
						<span style="color:#BCBCBCFF;"> geneset name; gene's hugo; gene's info; entrez ID </span><br />
						GLI1_UP.V1_DN; COPZ1; &emsp; ; 22818 <br />
						GLI1_UP.V1_DN; C10orf46; &emsp; ; 143384<br />
					</div>
					<br /><br />		

					<h2> &emsp; <i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> New GSEA analysis : expression levels</h2>	

					This import must precede the import of GSEA analyzes if the cell lines, the genes and / or genesets concerned are not yet integrated in the database. The importation of GSEA data on the cell lines already present in the database is possible. Note that we used the <a href="http://software.broadinstitute.org/gsea/downloads.jsp" target="_blank">C6 oncogenic signature</a>, downloaded from <a href="https://software.broadinstitute.org/gsea/index.jsp" target="_blank">Broad Institute</a> and that the rank of genes was made from a t-test. The rank of genes developed with a t-test requires having enough replicates in the analysis. <strong>Changing these settings can drastically change the results. Be sure to stay consistent, or indicate the change of settings on the corresponding pages.</strong><br /><br />

					<div class="text-center">
						<img src="/img/upexplevel.png" class="rounded mx-auto d-block"></img>
					</div><br /><br />						

					<h3>CSV format :</h3>
					<div class="col-md-12" id="reminder">
						<span style="color:#BCBCBCFF;"> cell line's name; gene's name; gene's symbol; gene's title; score </span><br />
						MCF7; TCN1; TCN1; transcobalamin I (vitamin B12 binding protein, R binder family); 10.03 <br />
						MCF7; SKAP1; SKAP1; src kinase associated phosphoprotein 1; 9.03 <br />
					</div>
					<br /><br />

					<h2> &emsp; <i class="glyphicon glyphicon-chevron-right" id="loginbutton"></i> New GSEA analysis : enrichment score</h2>

					In the same way as for the level expression, the cell lines and / or genesets concerned must already be integrated into the database. Otherwise, the integration of the data can not be done correctly.<br /><br />

					<div class="text-center">
						<img src="/img/upGSEAES.png" class="rounded mx-auto d-block"></img>
					</div><br /><br />	

					<h3>CSV format :</h3>
					<div class="col-md-12" id="reminder">
						<span style="color:#BCBCBCFF;"> geneset's name; cell line's name; link; size; ES; NES; NOMpval; FDRqval; FWERqval; rank_at_max; tags; list; signal </span><br />
						DCA_UP.V1_UP; BT474; DCA_UP.V1_UP; 161; 0.319; 1.225; 0.1241; 1; 0.912; 2334; tags=17%; list=11%; signal=19% <br />
						KRAS.600_UP.V1_DN; BT474; KRAS.600_UP.V1_DN; 266; 0.3239; 1.0334; 0.3896; 1; 0.997; 1166; tags=14%; list=6%; signal=15%<br />
					</div>
					<br /><br />

				</span>
			</div>	
		</section>

		<div class="alert alert-warning" id="warning_order" align="center">
			<strong>Please remember that the CSV format must delimit its columns with semicolon and that there must be no spaces in the data columns or any other characters that can be misinterpreted. In case of bad formatting of the file, the import will fail. Floating numbers must be written with a dot, like in english format, not with a comma.</strong>
		</div>

		<!-- <section id="order">
			<div class="jumbotron">
				<h2><i class="fa fa-list-alt"></i> ORDER</h2>
			</div>
		</section>

		<section id="format">
			<div class="jumbotron">
				<h2><i class="fa fa-file-text"></i> FORMAT</h2>
			</div>
		</section> -->
	
	</div>
	<!-- end sections -->
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  
	  $(window).scroll(function () {
	      //if you hard code, then use console
	      //.log to determine when you want the 
	      //nav bar to stick.  
	      console.log($(window).scrollTop())
	    if ($(window).scrollTop() > 50) {
	      $('#op-horizontalnav').addClass('navbar-fixed');
	    }
	    if ($(window).scrollTop() < 51) {
	      $('#op-horizontalnav').removeClass('navbar-fixed');
	    }
	  });

		/* ====== Add Smooth effect ===== */
		$(function() {
		  var scrollToAnchor = function( id ) {
		    var elem = $("section[id='"+ id +"']"); // on crée une balise d'ancrage
		    if ( typeof elem.offset()  === "undefined" ) { // on verifie si l'élément existe
				elem = $("#"+id); }
		    if ( typeof elem.offset()  !== "undefined" ) { // si l'élément existe, on continue
		      $('html, body').animate({
		              scrollTop: elem.offset().top }, 600 );} // on défini un temps de défilement de page
		  };
		  $("a").click(function( event ) { // on attache la fonction au click
		    if ( $(this).attr("href").match("#") ) { // on vérifie qu'il s'agit d'une ancre
		      event.preventDefault();
		      var href = $(this).attr('href').replace('#', '') // on scroll vers la cible
		      scrollToAnchor( href ); }
		  });
		});

		/* ====== add class on pagination if the section is visible ====== */
		$(document).scroll(function() {
			var cutoff = $(window).scrollTop() + 200; // on défini la position de déclenchement (*1)
			// Find current section and highlight nav menu
			var curSec = $.find('.current'); // on cherche l'élément (section) avec la class current
			var curID = $(curSec).attr('id'); // on récupère son ID
			var curNav = $.find('a[href=#'+curID+']'); // on cherche l'élément de navigation correspondant (*2)
			$('li .op-v-link').removeClass('active'); // on nettoie la navigation de la class active présente
			$(curNav).addClass('active'); // (*2) -> on ajoute la class active
			$('section').each(function(){
				if($(this).offset().top + $(this).height() > cutoff){ // si la section est dans le champ de scroll
					$('section').removeClass('current') // on nettoie les sections de la class current présente
					$(this).addClass('current'); // on ajoute la class current à la section visible
					return false; // on stoppe l’itération (le cas contraire, seule la derniere section se verra ajouter la class)
				}
			});
		});

	});




</script>

@stop
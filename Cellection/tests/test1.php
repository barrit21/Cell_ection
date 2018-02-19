<?php


 function CelllinesParsing(){
	$fichier=file('cell_lines.txt');#crée un tableau avec comme valeur les clés 

	$tab=array();

	foreach ($fichier as $key => $line) {
		$infos=explode("\t",$line);#crée un des un tableau avec en [0] la cell line et en [2] le nombre de réplicat
		echo '<pres>';#printer le tableau final
		print_r ($infos);
		echo '</pres>';
		$tab[]=array($infos[0]=>$infos[2]);
	}
	return $tab;
}

$datacelllines=CelllinesParsing();

//echo '<pres>';#printer le tableau final
//print_r ($datacelllines);
//echo '</pres>';
?>
//nous regadrons si c'est une collection ou un objet pour utiliser 
//la même view sans avoir d'exception
if(sizeof($categories)>1){
 echo "***** Une collection ********<br/>";
 foreach($categories as $cat)
 {
 echo $cat->id." ".$cat->name."<br/>";
 }
} else {
 echo "******** Un objet ********<br/>";
 print_r($categories->name);
}
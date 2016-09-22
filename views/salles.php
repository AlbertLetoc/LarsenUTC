<?php 
var_dump($sidebarFile);
$sidebarFile = "salles";
if(isset($salle)) {
	if($salle == "bas"){
		include_once('./views/salle_bas.php');
	}
	elseif ($salle == "studio"){
		include_once('./views/studio.php');
	}
}
?>
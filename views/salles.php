<?php 
$sidebarFile = "salles";
if(isset($salle)) {
	if($salle == "bas"){
		include_once('./views/salle_bas.php');
	}
	elseif ($salle == "studio"){
		include_once('./views/studio.php');
	}
	else{ ?>
	<div class="row links">
		<div class="col-md-12">
			<a href="/larsenUTC/">Accueil</a> > <a href="#">Répéter</a>
		</div>
	</div>
	<div class="splitter">
	</div>
	<div class="row title">
        <div class="col-md-12">
            <h1>Planning des salles de répétition</h1>
        </div>
	</div>
	<div class="calendar" style="height:750px;">
		<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=750&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=1f1vi7amvdvo15cpu4m6u7qh38%40group.calendar.google.com&amp;color=%23B1365F&amp;src=g7qh169e2c3s6eehbcfsuo3upg%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FParis" style="border-width:0" width="800" height="750" frameborder="0" scrolling="no"></iframe>
	</div>
	<?php
	}
}
?>
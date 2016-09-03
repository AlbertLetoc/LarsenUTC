
<?php

if (!isset($_GET['act'])) { // index
	//appel des vues
	include_once('./views/salles.php');
}
elseif ($_GET['act'] == "bas"){
	include_once('./views/salle_bas.php');
}
elseif ($_GET['act'] == "studio"){
	include_once('./views/studio.php');
}

?>

<ul>
	<li><a href="index.php?section=salles&act=bas">Salle du bas</a></li>
	<li><a href="index.php?section=salles&act=studio">Studio Décibels </a></li>
	<li><a href="index.php?section=salles">Les deux salles </a></li>
</ul>

<p>Cette année 2 créneaux de répétition seront des créneaux "libres". Ceci pour anticiper les demandes occasionnelles en cas de besoins particuliers, concert pressant, jours fériés etc... <br/>
Ces créneaux sont le .... de .... a .... et le .... de .... a .... dans la salle de répétition du bas.<br/>
Merci d'adresser vos demandes de réservation <b>AU MOINS 1 semaine a l'avance</b> par mail a <a href="mailto:larsen@assos.utc.fr">larsen@assos.utc.fr</a> .<br/>
Le bureau Larsen, par le biais de son resp' locaux enverra une validation de la réservation <b>AU MOINS 48h avant le créneau.</b><br/>
<em>Détail des conditions et offres valables a compter du 16/01/2058 jusqu'au 30/02/2013 sur <a href="http://assos.utc.fr/larsen">www.assos.utc.fr/larsen</a>.</em></p>

<p>Pour toute demande d'enregistrement ou de répétition dans le <a href="index.php?section=salles&act=studio">studio Décibels</a> (et ce de maniere exceptionnelle si le créneau libre n'est pas disponible), merci d'adresser un mail a <a href="mailto:decibels.asso.utc@gmail.com"> decibels.asso.utc@gmail.com </a>.</p>

<h3> Charte des locaux </h3>



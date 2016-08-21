<h1> Larsen fête ses 30 ans </h1>

<img src="./img/slide1.png" height="400" width="1080">

<p> La commission du PAE-UTC Larsen a été fondée le 26 novembre 1986 par un groupe d'étudiants ingénieurs passionés de musique. <br/>
	L’objectif de l’association est de rassembler et représenter au sein de l’UTC l’ensemble des musiciens ayant un attrait pour la pratique instrumentale/vocale de groupe, et participer à des évènements dans le but de promouvoir les musiciens UTCéens dans le cadre de l’UTC, de Compiègne ou a l’extérieur.
</p>

<p>
	Larsen dispose d’une salle de répétition au rez-de-chaussée de la Maison des étudiants et utilise également le studio d’enregistrement en collaboration avec l’association Décibels pour permettre à l’ensemble des groupes de pouvoir répéter.
</p>

<p>
	Beaucoup de groupes issus de LARSEN ont pu jouer lors d’évènements UTCéens : WEI, Gigot Bitume & Estu Parking, Vieilles Pipettes, Nuit Fauve, SDF, Festupic, UTCéenne, Gala, Jams LARSEN dans des bars, permanences au PIC… Ou hors UTC : Gala de l’ESCOM, ovalies, fête de la musique etc ...
</p>

<p>
	Si vous souhaitez jouer dans un groupe, peu importe le style musical, contactez-nous !
</p>


<h2> L'équipe Larsen</h2>

<?php
if (is_array($trombi) || is_object($trombi)){ // evite les bugs si aucun membre du bureau inscrit sur le portail des assos
	foreach($trombi as $membre) { ?>
		<div class="membre_bureau">
				<a href="<?php echo $membre['photo']?>"><img class="thumbnail" src="<?php echo $membre['photo']?>" height="125" width="125"></a>
				<p><b><?php echo $membre['login']?></b><br/>
				<?php echo $membre['role']?></p>
		</div>
		<?php }
} ?>

<div>
	<p> Mais aussi et surtout les 70 membres enthousiastes et exceptionnels qui forment les 22 groupes de Larsen ! <br/> Petite photo de famille</p>
</div>



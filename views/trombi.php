<div class="row links">
	<div class="col-md-12">
		<a href="/larsenUTC/">Accueil</a> > <a href="#">Association</a> > <b>Fonctionnement</b>
	</div>
</div>
<div class="splitter">
</div>
<div class="row title">
	<div class="col-md-12">
		<h1>L'association :</h1> Fonctionnement
	</div>
</div>
<?php
if (is_array($trombi) || is_object($trombi)){ // evite les bugs si aucun membre du bureau inscrit sur le portail des assos
	foreach($trombi as $membre) { ?>
		<div class="membre_bureau">
            <a href="<?php echo $membre['photo']?>"><img class="thumbnail" src="<?php echo $membre['photo']?>"></a>
            <b><?php echo $membre['login']?></b><br/>
            <?php echo $membre['role']?>
		</div>
		<?php }
} ?>

<div>
	 Mais aussi et surtout les 70 membres enthousiastes et exceptionnels qui forment les 22 groupes de Larsen ! <br/> Petite photo de famille
</div>
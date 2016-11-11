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
<div class="card row">
	<div class="card-content col-md-12">
		<?php
		if (is_array($trombi) || is_object($trombi)){ // evite les bugs si aucun membre du bureau inscrit sur le portail des assos
		foreach($trombi as $membre) { ?>
			<div class="membre_bureau" style="display: inline-block; margin: 20px;">
				<a href="<?php echo $membre['photo']?>"><img class="thumbnail" src="<?php echo $membre['photo']?>" width="150px;" /></a><br/>
				<b><?php echo UserInfo::getFullName($membre['login']); ?></b><br/>
				<?php echo $membre['role']?>
			</div>
			<?php }
		} ?>

		<h2>
			Mais aussi et surtout la centaine de membres enthousiastes et exceptionnels qui forment les 23 groupes de Larsen ! <br/> 
		</h2>
	</div>
</div>
<div class="row links">
	<div class="col-md-12">
		<a href="/larsenUTC/">Accueil</a> > <a>Association</a> > <b>Fonctionnement</b>
	</div>
</div>
<div class="splitter">
</div>
<div class="row title">
	<div class="col-md-12">
		<h1>L'association :</h1> Fonctionnement
	</div>
</div>
<div class="col-xs-12">
	<div class="card row">
		<div class="col-xs-12">
			<div class="row">
				<?php
				if (is_array($trombi) || is_object($trombi)){ // evite les bugs si aucun membre du bureau inscrit sur le portail des assos
				foreach($trombi as $membre) { ?>
					<div class="col-md-3 col-xs-12 col-sm-4 trombi">
						<div class="trombi-border">
							<img class="" src="<?php echo $membre['photo']?>" width="150px;" />
						</div>
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
	</div>
</div>
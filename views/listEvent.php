<?php $router = Router::getInstance(); ?>
<div class="row links">
	<div class="col-md-12">
		<a href="/larsenUTC/">Accueil</a> > <b>Evènements</b>
	</div>
</div>
<div class="splitter">
</div>
<div class="row title">
    <div class="col-md-12">
        <h1>Evènements :</h1> Tous les concerts prévus !
    </div>
</div>
<div class="row">
<?php
    if(is_array($events) || is_object($events)) { // evite les bugs en cas de résultat vide de la requete SQL, comme si pas d'articles rédigés dans la periode demandée par ex
        if (empty($events)) {
            echo "<h3>Aucun évènement</h3>";
        }
        else {
            foreach ($events as $event) {
                $i=0; // compteur de commentaires?>

                <div class="col-md-12 card">
                    <div class="row card-title">
                        <div class="col-md-2 card-date">
                            <div class="row">
                                <?php echo '<div class="col-md-6"><span class="card-date-day">'.date('d', strtotime($event['date_event'])).'</span></div><div class="col-md-6"><span class="card-date-month">'.utf8_encode(strftime('%b', strtotime($event['date_event']))).'</span><span class="card-date-year">'.date('Y', strtotime($event['date_event'])).'</span></div>'; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3><?php echo $event['nom']; ?></h3>
                        </div>
                    </div>
                    <div class="row card-content">
                        <div class="col-md-12">
                        <?php if($event['description']) {
                            echo trim_text($event['description'], 400);
                        }
                        else {
                            echo "Pas de description disponible";
                        }?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
?>
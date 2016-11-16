<div class="list-module row">
    <div class="col-md-12">
        <div class="row list-module-title">
            <div class="col-md-12">
                <h3><a href='<?php echo $router->getUrl('eventList'); ?>'>Évènements</a></h3>
            </div>
        </div>
        <div class="row">
            <?php 
            foreach($events as $event) { ?>
            <div class="col-md-12 list-row">
                <div class="row">
                    <div class="col-md-5 event-date">
                        <div class="row">
                            <?php echo '<div class="col-md-6"><span class="event-date-day">'.date('d', strtotime($event['date_event'])).'</span></div><div class="col-md-6"><span class="event-date-month">'.utf8_encode(strftime('%b', strtotime($event['date_event']))).'</span><span class="event-date-year">\''.date('y', strtotime($event['date_event'])).'</span></div>'; ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row event-info">
                            <span class="event-name col-md-12"><?php echo $event['nom']; ?></span>
                            <span class="event-place col-md-12">@<?php echo $event['lieu']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<div class="list-module row">
    <div class="col-md-12">
        <div class="row list-module-title">
            <div class="col-md-12">
                <h3>Enregistrements</h3>
            </div>
        </div>
        <div class="row">
            <?php 
            foreach($records as $record) { ?>
            <div class="col-md-12 list-row">
                <div class="row">
                    <div class="col-md-3 record-type">
                        <?php
                            if($record['type'] == "audio") {
                                echo '<span class="glyphicon glyphicon-cd"></span>';
                            }
                            else {
                                echo '<span class="glyphicon glyphicon-film"></span>';
                            }
                        ?>
                    </div>
                    <div class="col-md-9 record-info">
                        <div class="row">
                            <span class="record-name col-md-12"><?php echo $record['name']; ?></span>
                            <span class="record-artist col-md-12"><?php echo $record['artist']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>
</div>
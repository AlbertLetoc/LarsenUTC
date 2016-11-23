<div class="col-xs-6 col-md-12">
    <div class="list-module">
        <div class="col-xs-12">
            <div class="row list-module-title">
                <div class="col-xs-12">
                    <h3><a href='<?php echo $router->getUrl('eventList'); ?>'>Évènements</a></h3>
                </div>
            </div>
            <div class="row">
                <?php
                foreach($events as $event) { ?>
                <div class="col-xs-12 list-row">
                    <div class="row">
                        <div class="col-md-5 col-xs-3 event-date">
                            <div class="row">
                                <?php echo '<div class="col-xs-6"><span class="event-date-day">'.date('d', strtotime($event['date_event'])).'</span></div><div class="col-xs-6"><span class="event-date-month">'.utf8_encode(strftime('%b', strtotime($event['date_event']))).'</span><span class="event-date-year">\''.date('y', strtotime($event['date_event'])).'</span></div>'; ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-xs-9">
                            <div class="row event-info">
                                <span class="event-name col-xs-12"><?php echo $event['nom']; ?></span>
                                <span class="event-place col-xs-12">@<?php echo $event['lieu']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-xs-6">
    <div class="list-module">
        <div class="col-xs-12">
            <div class="row list-module-title">
                <div class="col-xs-12">
                    <h3>Enregistrements</h3>
                </div>
            </div>
            <div class="row">
                <?php
                foreach($records as $record) { ?>
                <div class="col-xs-12 list-row">
                    <div class="row">
                        <div class="col-xs-3 record-type">
                            <?php
                                if($record['type'] == "audio") {
                                    echo '<span class="glyphicon glyphicon-cd"></span>';
                                }
                                else {
                                    echo '<span class="glyphicon glyphicon-film"></span>';
                                }
                            ?>
                        </div>
                        <div class="col-xs-9 record-info">
                            <div class="row">
                                <span class="record-name col-xs-12"><?php echo $record['name']; ?></span>
                                <span class="record-artist col-xs-12"><?php echo $record['artist']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
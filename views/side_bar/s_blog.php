<div class="list-module row">
    <div class="col-md-12">
        <div class="row list-module-title">
            <div class="col-md-12">
                <h2>Évènements</h2>
            </div>
        </div>
        <div class="row">
            <?php 
            foreach($events as $event) { ?>
            <div class="col-md-12 list-row">
                <div class="row">
                    <div class="col-md-5 event-date">
                        <div class="row">
                            <?php echo '<div class="col-md-6"><span class="event-date-day">'.date('d', strtotime($event['date'])).'</span></div><div class="col-md-6"><span class="event-date-month">'.utf8_encode(strftime('%b', strtotime($event['date']))).'</span><span class="event-date-year">\''.date('y', strtotime($event['date'])).'</span></div>'; ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <span class="event-name"><?php echo $event['name']; ?></span>
                        <span class="event-place">@<?php echo $event['lieu']; ?></span>
                    </div>
                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>
</div>
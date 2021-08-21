<h2>Past Events</h2>
<ul class="historyList">
<?php foreach($events as $event): ?>
    <li>
        <div class="image">
            <?= $this->Html->image('Events/tnails/'.$event->flyer); ?>
        </div>
        <div class="info">
            <h3><?= $event->title ?></h3>
            <p class="date"><?= date('F j, Y', strtotime($event->date)); ?></p>
        </div>
    </li>
<?php endforeach; ?>
</ul>
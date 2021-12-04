<h2>Upcoming Events</h2>
<ul class="events">
<?php foreach($events as $event): ?>
    <li>
        <div class="image">
            <?= $this->Html->link($this->Html->image('Events/medium/'.$event->flyer), ['controller' => 'events', 'action' => 'view', $event->id], ['escape' => false]); ?>
        </div>
        <div class="info">
            <h3><?= $event->title ?></h3>
            <p class="date"><?= date('F j, Y', strtotime($event->date)) ?></p>
            <p class="time">Doors @ <?= date('g:i A', strtotime($event->date)) ?></p>
            <p class="venue"><?= $event->venue ?></p>
            <p class="city"><?= $event->city ?></p>
            <div class="details"><?= $event->details ?></div>
            <div class="buttons">
                <?= $this->Html->link('More Info', ['controller' => 'events', 'action' => 'view', $event->id], ['class' => 'button view left']); ?>
                <?php if (isset($event->tickets_url) && !empty($event->tickets_url)): ?>
                    <?= $this->Html->link('Buy Tickets', $event->tickets_url, ['class' => 'button tickets left', 'target' => '_blank']); ?>
                <?php endif ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </li>
<?php endforeach; ?>
</ul>

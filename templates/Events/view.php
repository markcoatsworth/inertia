<div class="eventView">
    <div class="buttons left">
        <?= $this->Html->link('Back to Events', ['controller' => 'pages', 'action' => 'home'], ['class' => 'button back left']) ?>
    </div>
    <div class="sharethis right">
        <span class="st_twitter_large" displayText="Tweet"></span>
        <span class="st_facebook_large" displayText="Facebook"></span>
        <span class="st_ybuzz_large" displayText="Yahoo! Buzz"></span>
        <span class="st_gbuzz_large" displayText="Google Buzz"></span>
        <span class="st_email_large" displayText="Email"></span>
        <span class="st_sharethis_large" displayText="ShareThis"></span>
    </div>
    <div class="clear"></div>

    <div class="image">
        <?= $this->Html->image('Events/'.$event->flyer) ?>
    </div>

    <h2><?= h($event->title) ?></h2>
    <p class="date"><?= date('F j, Y', strtotime($event->date)) ?></p>
    <p class="time">Doors @ <?= date('g:i A', strtotime($event->date)) ?></p>
    <p class="venue"><?= $event->venue ?></p>
    <p class="city"><?= $event->city ?></p>

    <div class="details">
        <?     $event->details ?>
    </div>

    <?php if (isset($event->moreinfo) && !empty($event->moreinfo)): ?>
        <h3>Additional Info:</h3>
        <div class="moreinfo">
            <?= $event->moreinfo ?>
        </div>
    <?php endif ?>
    
    <?php if (isset($event->tickets_url) && !empty($event->tickets_url)): ?>
        <div class="tickets">
            <?= $this->Html->link('Buy Tickets', $event->tickets_url, ['class' => 'button tickets', 'target' => '_blank']) ?>
        </div>
    <?php endif ?>

</div>
<div class="clear"></div>
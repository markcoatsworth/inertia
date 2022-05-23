<h2><?= $event->title ?></h2>
<div class="eventView">
    <div class="image"><?= $this->Html->image('Events/'.$event->flyer) ?></div>
    <p class="date"><?= date('F j, Y', strtotime($event->date)) ?></p>
    <p class="time">Doors @ <?= date('g:i A', strtotime($event->date)) ?></p>
    <p class="venue"><?= $event->venue ?></p>
    <p class="city"><?= $event->city ?></p>

    <div class="details">
        <? $event->details ?>
    </div>

    <?php if (isset($event->tickets_url) && !empty($event->tickets_url)): ?>
        <div class="tickets">
            <?= $this->Html->link('Buy Tickets', $event->tickets_url, ['class' => 'button tickets', 'target' => '_blank']) ?>
        </div>
    <?php endif ?>

    <?php if (isset($event->moreinfo) && !empty($event->moreinfo)): ?>
        <h3>Additional Info:</h3>
        <div class="moreinfo">
            <?= $event->moreinfo ?>
        </div>
    <?php endif ?>

    <?php if (isset($event->youtube_url) && !empty($event->youtube_url)): ?>
        <?php 
            $video_tokens = explode("=", $event->youtube_url);
            $video_id = $video_tokens[1];
            print("<iframe width=\"650\" height=\"366\" src=\"https://www.youtube.com/embed/".$video_id."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>");
        ?>
    <?php endif ?>

</div>
<div class="clear"></div>
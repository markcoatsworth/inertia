<?= $this->Form->create($event, ['type' => 'file']); ?>
<fieldset>
    <h3>Edit Event: <b><?= $event->title ?></b></h3>
    <table class="event">
        <tr>
            <td><label>Title</label></td>
            <td><?= $this->Form->control('title', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Date</label></td>
            <td><?= $this->Form->control('date', ['type' => 'datetime', 'label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Venue</label></td>
            <td><?= $this->Form->control('venue', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>City</label></td>
            <td><?= $this->Form->control('city', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Details</label><p>(Appears on the homepage events listing)</p></td>
            <td><?= $this->Form->control('details', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Flyer Image</label></td>
            <td><?= $this->Form->control('flyer', ['type' => 'file', 'label' => false]) ?>
            <?php if (isset($event->flyer) && !empty($event->flyer)) {
                    echo $this->Html->image('Events/'.$event->flyer);
                } ?>
            </td>
        </tr>
        <tr>
            <td><label>More Info</label><p>(Appears on the detailed event view)</p></td>
            <td><?= $this->Form->control('moreinfo', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Tickets URL</label></td>
            <td><?= $this->Form->control('tickets_url', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>YouTube URL</label></td>
            <td>
                <?= $this->Form->control('youtube_url', ['label' => false]) ?>
                <span class="description">Example: https://www.youtube.com/watch?v=JhiUacGzIg8</span>
                <?php
                    if (isset($event->youtube_url) && !empty($event->youtube_url)) {
                        $video_tokens = explode("=", $event->youtube_url);
                        $video_id = $video_tokens[1];
                        print("<iframe width=\"650\" height=\"366\" src=\"https://www.youtube.com/embed/".$video_id."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>");
                    }
                 ?>
            </td>
        </tr>
        <tr>
            <td><label>URL Slug</label><p>(Shortened title that appears in the event URL)</p></td>
            <td><?= $this->Form->control('slug', ['label' => false]) ?></td>
        </tr>
    </table>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
